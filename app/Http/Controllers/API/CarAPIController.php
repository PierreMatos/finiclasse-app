<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarAPIRequest;
use App\Http\Requests\API\UpdateCarAPIRequest;
use App\Models\Car;
use App\Models\User;
use App\Repositories\CarRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarResource;
use App\Http\Resources\CarCollection;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Class CarController
 * @package App\Http\Controllers\API
 */

class CarAPIController extends AppBaseController
{
    /** @var  CarRepository */
    private $carRepository;

    public function __construct(CarRepository $carRepo)
    {
        $this->carRepository = $carRepo;
    }

    /**
     * Display a listing of the Car.
     * GET|HEAD /cars
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        // $cars = $this->carRepository->all(
        //     $request->except(['skip', 'limit']),
        //     $request->get('skip'),
        //     $request->get('limit')
        // );

        // dd($this->carRepository->all());

        //TODO NAO mostrar carros reservados
        return new CarCollection( $this->carRepository->all());

        // return new CarCollection( $this->carRepository->paginate(2));

        // return $this->sendResponse(new CarCollection($cars::paginate()), 'Car Models retrieved successfully');

        // if ($request->condition != null) {

        //     $cars = Car::where('condition_id','=',$request->condition)->simplePaginate(5);

        // } else {

        //     $cars = Car::simplePaginate(5);

        // }
        
        // return new CarCollection($cars);





        // return $this->sendResponse(new CarCollection($cars), 'Cars retrieved successfully');

        //return JSON with Resource
            // return CarCollection::collection($data, [
            //     'success' => true,
            //     'message' => 'Cars retrieved successfully',
            // ]);



            // return (new CarResource(Car::paginate(5)));
        // return $this->sendResponse(new CarCollection(Car::paginate(5)), 'Cars retrieved successfully');
        // return $this->sendResponse(CarCollection::collection(Car::all()), 'Cars retrieved successfully');
        // return $this->sendResponse(CarResource::collection($cars), 'Cars retrieved successfully');
    }

    /**
     * Store a newly created Car in storage.
     * POST /cars
     *
     * @param CreateCarAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Car::$rules);

        $input = $request->all();

        $car = $this->carRepository->create($input);

        // add images
        if ($request->hasFile('image')) {
            $fileAdders = $car->addMultipleMediaFromRequest(['image'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('cars','s3');
                });
        }

        // add POS
        if ($request->hasFile('pos')) {
            $fileAdders = $car->addMultipleMediaFromRequest(['pos'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('pos','s3');
                });
        }

        return $this->sendResponse(new CarResource($car), 'Car saved successfully');
    }

    /**
     * Display the specified Car.
     * GET|HEAD /cars/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Car $car */
        $car = $this->carRepository->find($id);

        if (empty($car)) {
            return $this->sendError('Car not found');
        }

        return $this->sendResponse(new CarResource($car), 'Car retrieved successfully');
    }

    /**
     * Update the specified Car in storage.
     * PUT/PATCH /cars/{id}
     *
     * @param int $id
     * @param UpdateCarAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();
// return json_encode($input);
// return $this->sendResponse($input,$input);
// return($this->carRepository->update($input, $id));
        /** @var Car $car */
        $car = $this->carRepository->find($id);

        //Apagar imagem antiga se for mudada
        if ($request->hasFile('image')) {
            $car->clearMediaCollection('cars');
        }
    
        //Apagar POS antiga se for mudada
        if ($request->hasFile('pos')) {
            $car->clearMediaCollection('pos');
        }

        //Verificar se a imagem existe
        // $file = $request->file('image');

        //Verificar se a POS existe
        // $file = $request->file('pos');

        //adicionar imagem
        if (empty($request->hasFile('image'))) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();

            $fileAdders = $car->addMultipleMediaFromRequest(['image'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('cars','s3');
                });
        }

        //adicionar POS
        if (empty($request->hasFile('pos'))) {
            //Passar a variable input sem colocar novo pos
            $input = $request->all();
        } else {
            //Actualizar pos se colocar um novo
            $input = $request->all();

            $fileAdders = $car->addMultipleMediaFromRequest(['pos'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('pos','s3');
                });
        }

        if (empty($car)) {
            Flash::error('Car not found');

            return redirect(route('cars.index'));
        }


        if (empty($car)) {
            return $this->sendError('Car not found');
        }

        
        // $car->proposal->touch();
        $car = $this->carRepository->update($input, $id);

        return $this->sendResponse(new CarResource($car), 'Car updated successfully');
    }

    /**
     * Remove the specified Car from storage.
     * DELETE /cars/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Car $car */
        $car = $this->carRepository->find($id);

        if (empty($car)) {
            return $this->sendError('Car not found');
        }

        $car->delete();

        return $this->sendSuccess('Car deleted successfully');
    }

    public function addImage(Request $request){
        
        // $path = $request->file('avatar')->store('avatars', 'public');
        $path = $request->file('avatar');

        // return $path;

        $car = Car::find(3);
        // $car->addMedia($path)->toMediaCollection();

        $mediaItems = $car->getMedia();
        // return $mediaItems;
        // return  $car->getFirstMediaUrl();
        return $this->sendResponse(new CarResource($car), 'Car saved successfully');


    }
}
