<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarFuelAPIRequest;
use App\Http\Requests\API\UpdateCarFuelAPIRequest;
use App\Models\CarFuel;
use App\Repositories\CarFuelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarFuelResource;
use Response;

/**
 * Class CarFuelController
 * @package App\Http\Controllers\API
 */

class CarFuelAPIController extends AppBaseController
{
    /** @var  CarFuelRepository */
    private $carFuelRepository;

    public function __construct(CarFuelRepository $carFuelRepo)
    {
        $this->carFuelRepository = $carFuelRepo;
    }

    /**
     * Display a listing of the CarFuel.
     * GET|HEAD /carFuels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carFuels = $this->carFuelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CarFuelResource::collection($carFuels), 'Car Fuels retrieved successfully');
    }

    /**
     * Store a newly created CarFuel in storage.
     * POST /carFuels
     *
     * @param CreateCarFuelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarFuelAPIRequest $request)
    {
        $input = $request->all();

        $carFuel = $this->carFuelRepository->create($input);

        return $this->sendResponse(new CarFuelResource($carFuel), 'Car Fuel saved successfully');
    }

    /**
     * Display the specified CarFuel.
     * GET|HEAD /carFuels/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarFuel $carFuel */
        $carFuel = $this->carFuelRepository->find($id);

        if (empty($carFuel)) {
            return $this->sendError('Car Fuel not found');
        }

        return $this->sendResponse(new CarFuelResource($carFuel), 'Car Fuel retrieved successfully');
    }

    /**
     * Update the specified CarFuel in storage.
     * PUT/PATCH /carFuels/{id}
     *
     * @param int $id
     * @param UpdateCarFuelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarFuelAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarFuel $carFuel */
        $carFuel = $this->carFuelRepository->find($id);

        if (empty($carFuel)) {
            return $this->sendError('Car Fuel not found');
        }

        $carFuel = $this->carFuelRepository->update($input, $id);

        return $this->sendResponse(new CarFuelResource($carFuel), 'CarFuel updated successfully');
    }

    /**
     * Remove the specified CarFuel from storage.
     * DELETE /carFuels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarFuel $carFuel */
        $carFuel = $this->carFuelRepository->find($id);

        if (empty($carFuel)) {
            return $this->sendError('Car Fuel not found');
        }

        $carFuel->delete();

        return $this->sendSuccess('Car Fuel deleted successfully');
    }
}
