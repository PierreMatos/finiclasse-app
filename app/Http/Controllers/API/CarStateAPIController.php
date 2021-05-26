<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarStateAPIRequest;
use App\Http\Requests\API\UpdateCarStateAPIRequest;
use App\Models\CarState;
use App\Repositories\CarStateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarStateResource;
use Response;

/**
 * Class CarStateController
 * @package App\Http\Controllers\API
 */

class CarStateAPIController extends AppBaseController
{
    /** @var  CarStateRepository */
    private $carStateRepository;

    public function __construct(CarStateRepository $carStateRepo)
    {
        $this->carStateRepository = $carStateRepo;
    }

    /**
     * Display a listing of the CarState.
     * GET|HEAD /carStates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carStates = $this->carStateRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CarStateResource::collection($carStates), 'Car States retrieved successfully');
    }

    /**
     * Store a newly created CarState in storage.
     * POST /carStates
     *
     * @param CreateCarStateAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarStateAPIRequest $request)
    {
        $input = $request->all();

        $carState = $this->carStateRepository->create($input);

        return $this->sendResponse(new CarStateResource($carState), 'Car State saved successfully');
    }

    /**
     * Display the specified CarState.
     * GET|HEAD /carStates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarState $carState */
        $carState = $this->carStateRepository->find($id);

        if (empty($carState)) {
            return $this->sendError('Car State not found');
        }

        return $this->sendResponse(new CarStateResource($carState), 'Car State retrieved successfully');
    }

    /**
     * Update the specified CarState in storage.
     * PUT/PATCH /carStates/{id}
     *
     * @param int $id
     * @param UpdateCarStateAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarStateAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarState $carState */
        $carState = $this->carStateRepository->find($id);

        if (empty($carState)) {
            return $this->sendError('Car State not found');
        }

        $carState = $this->carStateRepository->update($input, $id);

        return $this->sendResponse(new CarStateResource($carState), 'CarState updated successfully');
    }

    /**
     * Remove the specified CarState from storage.
     * DELETE /carStates/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarState $carState */
        $carState = $this->carStateRepository->find($id);

        if (empty($carState)) {
            return $this->sendError('Car State not found');
        }

        $carState->delete();

        return $this->sendSuccess('Car State deleted successfully');
    }
}
