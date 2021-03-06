<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\Car;
use App\Models\User;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Providers\PushAddTradeIn;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CarResource;
use App\Repositories\CarRepository;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\CarCollection;
use Illuminate\Support\Facades\Validator;
USE App\Mail\TradeInApproval;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateCarAPIRequest;
use App\Http\Requests\API\UpdateCarAPIRequest;

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

        //convert react string into bool 
        if (isset($input['potencial_buyer'])){

            $input['potencial_buyer'] = json_decode($input['potencial_buyer']);
            
        }

        $car = $this->carRepository->create($input);

        // add images
        if ($request->hasFile('image')) {
            $fileAdders = $car->addMultipleMediaFromRequest(['image'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('cars','s3');
                });
        }

        // add POS
        if ($request->file('pos')) {
            $file = $request->file('pos');
            $car->addMedia($file)->toMediaCollection('pos','s3');
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

        /** @var Car $car */
        $car = $this->carRepository->find($id);

        //Apagar POS antiga se for mudada
        if ($request->hasFile('pos')) {
            $car->clearMediaCollection('pos');
        }

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

        $file = $request->file('pos');

        //Verificar se a imagem existe POS
        if($request->hasFile('file') == null) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();
            $car->addMedia($file)->toMediaCollection('pos','s3');
        }

        //Apagar imagem antiga se for mudada  
        if($request->hasFile('pos')){
            $car->clearMediaCollection('pos','s3');
        }

        if (empty($car)) {
            Flash::error('Car not found');

            return redirect(route('cars.index'));
        }

        if (isset($input['potencial_buyer'])){

            $input['potencial_buyer'] = json_decode($input['potencial_buyer']);
        }

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
