<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\CarModel;
use App\Providers\NewCar;
use Illuminate\Http\Request;
use App\Repositories\CarRepository;
use App\Repositories\MakeRepository;
use App\Repositories\StandRepository;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Providers\PushValidatedTradeIn;
use App\Repositories\CarFuelRepository;
use App\Repositories\CarClassRepository;
use App\Repositories\CarDriveRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\CarStateRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
use App\Providers\PushRejectedTradeIn;
use App\Repositories\CarCategoryRepository;
use App\Repositories\CarConditionRepository;
use App\Repositories\CarTransmissionRepository;

class CarController extends AppBaseController
{
    /** @var  CarRepository */
    private $carRepository;
    /** @var  CarConditionRepository */
    private $carConditionRepository;
    /** @var  MakeRepository */
    private $MakeRepository;
    /** @var  CarModelRepository */
    private $CarModelRepository;
    /** @var  CarCategoryRepository */
    private $CarCategoryRepository;
    /** @var  CarStateRepository */
    private $CarStateRepository;
    /** @var  StandRepository */
    private $StandRepository;
    /** @var  CarTransmissionRepository */
    private $CarTransmissionRepository;
    /** @var  CarDriveRepository */
    private $CarDriveRepository;
    /** @var  CarFuelRepository */
    private $CarFuelRepository;
    /** @var  CarClassRepository */
    private $CarClassRepository;

    public function __construct(
        CarRepository $carRepo,
        CarConditionRepository $carConditionRepo,
        MakeRepository $makeRepo,
        CarModelRepository $modelRepo,
        CarCategoryRepository $carCategoryRepo,
        CarStateRepository $carStateRepo,
        StandRepository $standRepo,
        CarFuelRepository $carFuelRepo,
        CarTransmissionRepository $carTransmissionRepo,
        CarDriveRepository $carDriveRepo,
        CarClassRepository $carClassRepo
    ) {
        $this->carRepository = $carRepo;
        $this->makeRepository = $makeRepo;
        $this->modelRepository = $modelRepo;
        $this->standRepository = $standRepo;
        $this->carStateRepository = $carStateRepo;
        $this->carFuelRepository = $carFuelRepo;
        $this->carDriveRepository = $carDriveRepo;
        $this->carConditionRepository = $carConditionRepo;
        $this->carCategoryRepository = $carCategoryRepo;
        $this->carTransmissionRepository = $carTransmissionRepo;
        $this->carClassRepository = $carClassRepo;
    }

    /**
     * Display a listing of the Car.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cars = $this->carRepository->all();

        // $newCars = Car::where('condition_id', '=', 1)->get();
        // $usedCars = Car::where('condition_id', '=', 2)->get();
        // $cars = Car::with('stand')->paginate(10);
        $newCars = $this->carRepository->carByCondition(1);
        $usedCars = $this->carRepository->carByCondition(2);
        $carConditions = $this->carConditionRepository->all()->where('id', '!=', 1);
        $carData = [];
        $forCarConditions = $this->carConditionRepository->all();

        // dd($carConditions);
        // dd($carConditions->name);
        return view('cars.index')
            ->with('cars', $cars)
            ->with('newCars', $newCars)
            ->with('usedCars', $usedCars)
            ->with('carData', $carData)
            ->with('carConditions', $carConditions)
            ->with('forCarConditions', $forCarConditions);
    }

    /**
     * Show the form for creating a new Car.
     *
     * @return Response
     */
    public function create($id)
    {
        // VARIAVEIS REFERENTES AS LISTAGENS DE MODELOS ($modelName)
        $models = $this->modelRepository->all();
        $makes = $this->makeRepository->all();
        $categories = $this->carCategoryRepository->all();
        $conditions = $this->carConditionRepository->all();
        $states = $this->carStateRepository->all();
        $stands = $this->standRepository->all();
        $transmissions = $this->carTransmissionRepository->all();
        $drives = $this->carDriveRepository->all();
        $fuels = $this->carFuelRepository->all();
        $classes = $this->carClassRepository->all();
        
        //Car Conditions para a página create
        $condition = $this->carConditionRepository->find($id);

        $carData = ([
            'models' => $models,
            'makes' => $makes,
            'categories' => $categories,
            'conditions' => $conditions,
            'states' => $states,
            'stands' => $stands,
            'transmissions' => $transmissions,
            'drives' => $drives,
            'fuels' => $fuels,
            'classes' => $classes
        ]);

        return view('cars.create')
            ->with('condition', $condition)
            ->with('carData', $carData);
    }

    public function fetchModel(Request $request)
    {
        $data['models'] = CarModel::where("make_id", $request->make_id)->get(["name", "id"]);
        return response()->json($data);
    }

    /**
     * Store a newly created Car in storage.
     *
     * @param CreateCarRequest $request
     *
     * @return Response
     */
    public function store(CreateCarRequest $request)
    {
        $request->validate([
            'make_id' => 'required',
            'model_id' => 'required',
            'motorization' => 'required',
        ]);

        $input = $request->all();

        $car = $this->carRepository->create($input);

        if ($request->hasFile('image')) {
            $fileAdders = $car->addMultipleMediaFromRequest(['image'])
                ->each(function ($fileAdder) {
                    // $fileAdder->toMediaCollection('cars');
                    $fileAdder->toMediaCollection('cars', 's3');
                    // $benefit->addMedia($document)->toMediaCollection('benefits','s3');

                });
        }

        //Event notification
        event(new NewCar($car)); 

        Flash::success(__('translation.car saved'));

        return redirect(route('cars.index'));
    }

    /**
     * Display the specified Car.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $car = $this->carRepository->find($id);

        if (empty($car)) {
            Flash::error(__('translation.car not found'));

            return redirect(route('cars.index'));
        }

        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified Car.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // DADOS DO CARRO PARA EDITAR
        $car = $this->carRepository->find($id);

        // VARIAVEIS REFERENTES AS LISTAGENS DE MODELOS ($modelName)
        $models = $this->modelRepository->all();
        $makes = $this->makeRepository->all();
        $categories = $this->carCategoryRepository->all();
        $conditions = $this->carConditionRepository->all();
        $states = $this->carStateRepository->all();
        $stands = $this->standRepository->all();
        $transmissions = $this->carTransmissionRepository->all();
        $drives = $this->carDriveRepository->all();
        $fuels = $this->carFuelRepository->all();
        $classes = $this->carClassRepository->all();

        $carData = ([
            'models' => $models,
            'makes' => $makes,
            'categories' => $categories,
            'conditions' => $conditions,
            'states' => $states,
            'stands' => $stands,
            'transmissions' => $transmissions,
            'drives' => $drives,
            'fuels' => $fuels,
            'classes' => $classes
        ]);

        if (empty($car)) {
            Flash::error(__('translation.car not found'));

            return redirect(route('cars.index'));
        }

        return view('cars.edit')
            ->with('car', $car)
            ->with('carData', $carData);
    }

    /**
     * Update the specified Car in storage.
     *
     * @param int $id
     * @param UpdateCarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarRequest $request)
    {
        $request->validate([
            'image' => 'array|max:4',
            'image.*' => 'nullable|mimes:jpeg,png,jpg|dimensions:max_width=10000,max_height=10000|file|max:10000'
        ]);

        $car = $this->carRepository->find($id);

        //Apagar imagem antiga se for mudada
        if ($request->hasFile('image')) {
            // $car->clearMediaCollection('cars');
            $car->clearMediaCollection('cars', 's3');
        }

        //Verificar se a imagem existe
        $file = $request->file('image');

        if ($request->hasFile('image') == null) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();

            $fileAdders = $car->addMultipleMediaFromRequest(['image'])
                ->each(function ($fileAdder) {
                    // $fileAdder->toMediaCollection('cars');
                    $fileAdder->toMediaCollection('cars', 's3');
                });
        }

        if (empty($car)) {
            Flash::error(__('translation.car not found'));

            return redirect(route('cars.index'));
        }

        $car = $this->carRepository->update($request->all(), $id);

        Flash::success(__('translation.car updated'));

        return redirect(route('cars.index'));
    }

    /**
     * Remove the specified Car from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $car = $this->carRepository->find($id);

        if (empty($car)) {
            Flash::error(__('translation.car not found'));

            return redirect(route('cars.index'));
        }

        $this->carRepository->delete($id);

        Flash::success(__('translation.car deleted'));

        return redirect(route('cars.index'));
    }

    public function carState(Request $request)
    {
        // dd($request->state);
        // return ($request->state);
        // return response()->json(['success'=>'Ajax request submitted successfully']);

        $car = Car::query()->with('proposalTradeIn')->find($request->car);

        if (empty($request->car)) {
            Flash::error(__('translation.car not found'));

            return redirect(route('proposals.index'));
        }

        // if ($request->state = 0) {

        //     //delete car

        //     $this->carRepository->delete($request->car);

        //     Flash::success(__('translation.car deleted'));

        //     return redirect(route('proposals.index'));

        // } else {

        //update $car with $state
        $car = $this->carRepository->update(['state_id' => $request->state, 'tradein_purchase' => $request->price], $request->car);

        //Push & Notification Validated TradeIn
        if ($request->state == 8) {
            event(new PushValidatedTradeIn($car));
        }

        //if reject -> delete car and desync and push notify
        if ($request->state == 7){

            $proposal = $car->proposalTradeIn;
            $proposal->tradein_id = null;
            $proposal->save();

            $this->carRepository->delete($car->id);

            event(new PushRejectedTradeIn($car));
        }
        // return response()->json(['success'=> 'Retoma editada com sucesso']);

        return response()->json(['success' => Flash::success(__('translation.tradein rejected'))]);

        return redirect(route('proposals.index'));
        // }
    }

    public function indexNewCars()
    {
        if (request()->ajax()) {
            return datatables()->of($this->carRepository->carByCondition(1))
                ->addColumn('action', 'cars.car-action')
                ->addColumn('makes', function (Car $car) {
                    return $car->model->make->name;
                })
                ->addColumn('models', function (Car $car) {
                    return $car->model->name;
                })
                ->addColumn('stands', function (Car $car) {
                    return $car->stand ? $car->stand->name : '';
                })
                ->addColumn('states', function (Car $car) {
                    return $car->state->name;
                })
                ->addColumn('order_date', function (Car $car) {
                    return $car->order_date ? with(new Carbon($car->order_date))->translatedFormat('F/Y') : '';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }


        $makes = $this->makeRepository->all();
        $models = $this->modelRepository->all();
        $states = $this->carStateRepository->all();
        $stands = $this->standRepository->all();

        $carData = ([
            'makes' => $makes,
            'models' => $models,
            'states' => $states,
            'stands' => $stands
        ]);

        return view('cars.cars-ajax')->with('carData', $carData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewCars(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'make_id' => 'required',
            'model_id' => 'required',
            'stand_id' => 'required',
            'state_id' => 'required',
            'observations' => 'string|max:100|nullable',
        ]);

        if ($validator->passes()) {

            $carId = $request->id;

            $car = Car::updateOrCreate(
                [
                    'id' => $carId
                ],
                [
                    'make_id' => $request->make_id,
                    'model_id' => $request->model_id,
                    'color_exterior' => $request->color_exterior,
                    'est' => $request->est,
                    'komm' => $request->komm,
                    'stand_id' => $request->stand_id,
                    'state_id' => $request->state_id,
                    'order_date' => $request->order_date,
                    'observations' => $request->observations,
                    // Hidden
                    'category_id' => 1,
                    'condition_id' => 1,
                ]
            );

            //Dispara só quando o carro é criado
            if($car->wasRecentlyCreated) {
                //Event notification
                event(new NewCar($car));
            }

            return response()->json($car);
        }

        return response()->json(['error' => $validator->errors()]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function editNewCars(Request $request)
    {
        $where = array('id' => $request->id);
        $car = Car::where($where)->with('model.make')->first();

        return response()->json($car);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroyNewCar(Request $request)
    {
        $car = Car::where('id', $request->id)->delete();

        return Response()->json($car);
    }
}
