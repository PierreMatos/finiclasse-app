<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarModelRequest;
use App\Http\Requests\UpdateCarModelRequest;
use App\Repositories\CarModelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CarModelController extends AppBaseController
{
    /** @var  CarModelRepository */
    private $carModelRepository;

    public function __construct(CarModelRepository $carModelRepo)
    {
        $this->carModelRepository = $carModelRepo;
    }

    /**
     * Display a listing of the CarModel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carModels = $this->carModelRepository->all();

        return view('car_models.index')
            ->with('carModels', $carModels);
    }

    /**
     * Show the form for creating a new CarModel.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_models.create');
    }

    /**
     * Store a newly created CarModel in storage.
     *
     * @param CreateCarModelRequest $request
     *
     * @return Response
     */
    public function store(CreateCarModelRequest $request)
    {
        $input = $request->all();

        $carModel = $this->carModelRepository->create($input);

        Flash::success('Car Model saved successfully.');

        return redirect(route('carModels.index'));
    }

    /**
     * Display the specified CarModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carModel = $this->carModelRepository->find($id);

        if (empty($carModel)) {
            Flash::error('Car Model not found');

            return redirect(route('carModels.index'));
        }

        return view('car_models.show')->with('carModel', $carModel);
    }

    /**
     * Show the form for editing the specified CarModel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carModel = $this->carModelRepository->find($id);

        if (empty($carModel)) {
            Flash::error('Car Model not found');

            return redirect(route('carModels.index'));
        }

        return view('car_models.edit')->with('carModel', $carModel);
    }

    /**
     * Update the specified CarModel in storage.
     *
     * @param int $id
     * @param UpdateCarModelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarModelRequest $request)
    {
        $carModel = $this->carModelRepository->find($id);

        if (empty($carModel)) {
            Flash::error('Car Model not found');

            return redirect(route('carModels.index'));
        }

        $carModel = $this->carModelRepository->update($request->all(), $id);

        Flash::success('Car Model updated successfully.');

        return redirect(route('carModels.index'));
    }

    /**
     * Remove the specified CarModel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carModel = $this->carModelRepository->find($id);

        if (empty($carModel)) {
            Flash::error('Car Model not found');

            return redirect(route('carModels.index'));
        }

        $this->carModelRepository->delete($id);

        Flash::success('Car Model deleted successfully.');

        return redirect(route('carModels.index'));
    }
}
