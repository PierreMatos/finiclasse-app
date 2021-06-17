<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarFuelRequest;
use App\Http\Requests\UpdateCarFuelRequest;
use App\Repositories\CarFuelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CarFuelController extends AppBaseController
{
    /** @var  CarFuelRepository */
    private $carFuelRepository;

    public function __construct(CarFuelRepository $carFuelRepo)
    {
        $this->carFuelRepository = $carFuelRepo;
    }

    /**
     * Display a listing of the CarFuel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carFuels = $this->carFuelRepository->all();

        return view('car_fuels.index')
            ->with('carFuels', $carFuels);
    }

    /**
     * Show the form for creating a new CarFuel.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_fuels.create');
    }

    /**
     * Store a newly created CarFuel in storage.
     *
     * @param CreateCarFuelRequest $request
     *
     * @return Response
     */
    public function store(CreateCarFuelRequest $request)
    {
        $input = $request->all();

        $carFuel = $this->carFuelRepository->create($input);

        Flash::success('Car Fuel saved successfully.');

        return redirect(route('carFuels.index'));
    }

    /**
     * Display the specified CarFuel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carFuel = $this->carFuelRepository->find($id);

        if (empty($carFuel)) {
            Flash::error('Car Fuel not found');

            return redirect(route('carFuels.index'));
        }

        return view('car_fuels.show')->with('carFuel', $carFuel);
    }

    /**
     * Show the form for editing the specified CarFuel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carFuel = $this->carFuelRepository->find($id);

        if (empty($carFuel)) {
            Flash::error('Car Fuel not found');

            return redirect(route('carFuels.index'));
        }

        return view('car_fuels.edit')->with('carFuel', $carFuel);
    }

    /**
     * Update the specified CarFuel in storage.
     *
     * @param int $id
     * @param UpdateCarFuelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarFuelRequest $request)
    {
        $carFuel = $this->carFuelRepository->find($id);

        if (empty($carFuel)) {
            Flash::error('Car Fuel not found');

            return redirect(route('carFuels.index'));
        }

        $carFuel = $this->carFuelRepository->update($request->all(), $id);

        Flash::success('Car Fuel updated successfully.');

        return redirect(route('carFuels.index'));
    }

    /**
     * Remove the specified CarFuel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carFuel = $this->carFuelRepository->find($id);

        if (empty($carFuel)) {
            Flash::error('Car Fuel not found');

            return redirect(route('carFuels.index'));
        }

        $this->carFuelRepository->delete($id);

        Flash::success('Car Fuel deleted successfully.');

        return redirect(route('carFuels.index'));
    }
}
