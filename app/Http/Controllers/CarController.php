<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\Request;
use App\Repositories\CarRepository;
use Illuminate\Support\Facades\Log;
use App\Repositories\MakeRepository;
use App\Repositories\StandRepository;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Repositories\CarFuelRepository;
use App\Repositories\CarClassRepository;
use App\Repositories\CarDriveRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\CarStateRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;
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

        $newCars = Car::where('condition_id', '=', 1)->get();
        $usedCars = Car::where('condition_id', '=', 2)->get();
        // $cars = Car::with('stand')->paginate(10);
        // $cars2 = $this->carRepository->withAll();
        $carConditions = $this->carConditionRepository->all();
        $carData = [];

        return view('cars.index')
            ->with('cars', $cars)
            ->with('newCars', $newCars)
            ->with('usedCars', $usedCars)
            ->with('carData', $carData)
            ->with('carConditions', $carConditions);
    }

    /**
     * Show the form for creating a new Car.
     *
     * @return Response
     */
    public function create()
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
                    $fileAdder->toMediaCollection('cars');
                });
        }

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
            'image.*' => 'nullable|mimes:jpeg,png,jpg|dimensions:max_width=5000,max_height=5000|file|max:10000'
        ]);

        $car = $this->carRepository->find($id);

        //Apagar imagem antiga se for mudada
        if ($request->hasFile('image')) {
            $car->clearMediaCollection('cars');
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
                    $fileAdder->toMediaCollection('cars');
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

        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();

        if ($route == 'cars.index') {
            return redirect(route('cars.index'));
        } elseif ($route == 'newCars') {
            return redirect(route('newCars'));
        }
    }



    // Fetch records
    public function getCars(Request $request)
    {

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Car::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Car::select('count(*) as allcount')->where('model_id', 'like', '%' . $searchValue . '%')->count();


        // Fetch records
        $records = Car::orderBy($columnName, $columnSortOrder)
            //    ->where('car.model.name', 'like', '%' .$searchValue . '%')
            //   ->select('cars.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        // $records =  $this->carRepository->all();
        foreach ($records as $record) {

            $data_arr[] = array(
                "id" => $record->id,
                "model" => $record->model->name,
                "variant" => $record->variant,
                "state" => $record->state,
                //    "condition" => $record->condition,
                //    "komm" => $record->komm,
                "plate" => $record->plate,
                "stand" => $record->stand->name ?? '',
                "price" => $record->price,
                "action" => "nada"
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }

    public function carState(Request $request)
    {
        $car = $this->carRepository->find($request->car);

        if (empty($request->car)) {
            Flash::error(__('translation.car not found'));

            return redirect(route('proposals.index'));
        }

        if ($request->state = 0) {

            //delete car

            $this->carRepository->delete($request->car);

            Flash::success(__('translation.car deleted'));

            return redirect(route('proposals.index'));
        } else {

            //update $car with $state
            $car = $this->carRepository->update(['state_id' => $request->state, 'tradein_purchase' => $request->price], $request->car);

            Flash::success(__('translation.retoma accepted'));

            return redirect(route('proposals.index'));
        }
    }

    public function newCars()
    {
        $newCars = Car::where('condition_id', '=', 1)->get();
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

        return view('cars.newCars')
            ->with('newCars', $newCars)
            ->with('carData', $carData);
    }

    public function newCarsPost(CreateCarRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'make_id' => 'required',
            'model_id' => 'required',
            'komm' => 'required',
            'color_exterior' => 'required',
            'est' => 'required',
            'state_id' => 'required',
            'order_date' => 'required',
            'observations' => 'required',
        ]);

        if ($validator->passes()) {

            $input = $request->all();

            $car = $this->carRepository->create($input);

            return response()->json($car);
        }

        return response()->json(['error' => $validator->errors()]);
    }

    public function newCarsUpdate($id, UpdateCarRequest $request)
    {
        $validator = Validator::make($request->all(), [
           
        ]);

        if ($validator->passes()) {

            $car = $this->carRepository->find($id);

            $car = $this->carRepository->update($request->all(), $id);

            return response()->json($car);
        }

        return response()->json(['error' => $validator->errors()]);
    }
}
