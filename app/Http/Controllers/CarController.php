<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Repositories\CarRepository;
use App\Repositories\MakeRepository;
use App\Repositories\StandRepository;
use App\Repositories\CarTransmissionRepository;
use App\Repositories\CarModelRepository;
use App\Repositories\CarFuelRepository;
use App\Repositories\CarDriveRepository;
use App\Repositories\CarStateRepository;
use App\Repositories\CarClassRepository;
use App\Repositories\CarCategoryRepository;
use App\Repositories\CarConditionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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

    public function __construct(CarRepository $carRepo, CarConditionRepository $carConditionRepo, 
    MakeRepository $makeRepo, CarModelRepository $modelRepo, CarCategoryRepository $carCategoryRepo,
    CarStateRepository $carStateRepo, StandRepository $standRepo, CarFuelRepository $carFuelRepo,
    CarTransmissionRepository $carTransmissionRepo, CarDriveRepository $carDriveRepo,
    CarClassRepository $carClassRepo)
    {
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
        $carConditions = $this->carConditionRepository->all();

        return view('cars.index')
            ->with('cars', $cars)
            ->with('carConditions', $carConditions);
    }

    /**
     * Show the form for creating a new Car.
     *
     * @return Response
     */
    public function create()
    {
        $makes = $this->makeRepository->all();
        $models = $this->modelRepository->all();
        $carCategories = $this->carCategoryRepository->all();
        $carConditions = $this->carConditionRepository->all();
        $carStates = $this->carStateRepository->all();
        $stands = $this->standRepository->all();
        $carTransmissions = $this->carTransmissionRepository->all();
        $carDrives = $this->carDriveRepository->all();
        $carFuels = $this->carFuelRepository->all();
        $carClasses = $this->carClassRepository->all();

        return view('cars.create')
        ->with('stands', $stands)
        ->with('makes', $makes)
        ->with('carDrives', $carDrives)
        ->with('carFuels', $carFuels)
        ->with('carClasses', $carClasses)
        ->with('carTransmissions', $carTransmissions)
        ->with('carCategories', $carCategories)
        ->with('carConditions', $carConditions)
        ->with('carStates', $carStates)
        ->with('models', $models);
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
        $input = $request->all();

        $car = $this->carRepository->create($input);

        Flash::success('Car saved successfully.');

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
            Flash::error('Car not found');

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
        $car = $this->carRepository->find($id);

  
        // dd($car);
        $model = $this->modelRepository->find($car->model->id);

        $carModel = $this->modelRepository->find($car->model->id);
        $carMake = $this->makeRepository->find($car->model->make->id);
        $carMake = $this->makeRepository->find($car->model->make->id);

        $makes = $this->makeRepository->all();
        $models = $this->modelRepository->all();
        $carCategories = $this->carCategoryRepository->all();
        $carConditions = $this->carConditionRepository->all();
        $carStates = $this->carStateRepository->all();
        $stands = $this->standRepository->all();
        $carTransmissions = $this->carTransmissionRepository->all();
        $carDrives = $this->carDriveRepository->all();
        $carFuels = $this->carFuelRepository->all();
        $carClasses = $this->carClassRepository->all();

        // dd($model->name);
        return view('cars.create')
        ->with('car', $car)
        ->with('carModel', $model)
        ->with('carModel', $carModel)
        ->with('carMake', $carMake)
        ->with('stands', $stands)
        ->with('makes', $makes)
        ->with('carDrives', $carDrives)
        ->with('carFuels', $carFuels)
        ->with('carClasses', $carClasses)
        ->with('carTransmissions', $carTransmissions)
        ->with('carCategories', $carCategories)
        ->with('carConditions', $carConditions)
        ->with('carStates', $carStates)
        ->with('models', $models);
        

        if (empty($car)) {
            Flash::error('Car not found');

            return redirect(route('cars.index'));
        }

        return view('cars.edit')
        ->with('car', $car)
        ->with('stands', $stands)
        ->with('makes', $makes)
        ->with('carDrives', $carDrives)
        ->with('carFuels', $carFuels)
        ->with('carClasses', $carClasses)
        ->with('carTransmissions', $carTransmissions)
        ->with('carCategories', $carCategories)
        ->with('carConditions', $carConditions)
        ->with('carStates', $carStates)
        ->with('models', $models);
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
        $car = $this->carRepository->find($id);

        if (empty($car)) {
            Flash::error('Car not found');

            return redirect(route('cars.index'));
        }

        $car = $this->carRepository->update($request->all(), $id);

        Flash::success('Car updated successfully.');

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
            Flash::error('Car not found');

            return redirect(route('cars.index'));
        }

        $this->carRepository->delete($id);

        Flash::success('Car deleted successfully.');

        return redirect(route('cars.index'));
    }
}
