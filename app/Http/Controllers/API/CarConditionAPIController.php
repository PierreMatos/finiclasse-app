<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarConditionAPIRequest;
use App\Http\Requests\API\UpdateCarConditionAPIRequest;
use App\Models\CarCondition;
use App\Repositories\CarConditionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarConditionResource;
use Response;

/**
 * Class CarConditionController
 * @package App\Http\Controllers\API
 */

class CarConditionAPIController extends AppBaseController
{
    /** @var  CarConditionRepository */
    private $carConditionRepository;

    public function __construct(CarConditionRepository $carConditionRepo)
    {
        $this->carConditionRepository = $carConditionRepo;
    }

    /**
     * Display a listing of the CarCondition.
     * GET|HEAD /carConditions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carConditions = $this->carConditionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CarConditionResource::collection($carConditions), 'Car Conditions retrieved successfully');
    }

    /**
     * Store a newly created CarCondition in storage.
     * POST /carConditions
     *
     * @param CreateCarConditionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarConditionAPIRequest $request)
    {
        $input = $request->all();

        $carCondition = $this->carConditionRepository->create($input);

        return $this->sendResponse(new CarConditionResource($carCondition), 'Car Condition saved successfully');
    }

    /**
     * Display the specified CarCondition.
     * GET|HEAD /carConditions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarCondition $carCondition */
        $carCondition = $this->carConditionRepository->find($id);

        if (empty($carCondition)) {
            return $this->sendError('Car Condition not found');
        }

        return $this->sendResponse(new CarConditionResource($carCondition), 'Car Condition retrieved successfully');
    }

    /**
     * Update the specified CarCondition in storage.
     * PUT/PATCH /carConditions/{id}
     *
     * @param int $id
     * @param UpdateCarConditionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarConditionAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarCondition $carCondition */
        $carCondition = $this->carConditionRepository->find($id);

        if (empty($carCondition)) {
            return $this->sendError('Car Condition not found');
        }

        $carCondition = $this->carConditionRepository->update($input, $id);

        return $this->sendResponse(new CarConditionResource($carCondition), 'CarCondition updated successfully');
    }

    /**
     * Remove the specified CarCondition from storage.
     * DELETE /carConditions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarCondition $carCondition */
        $carCondition = $this->carConditionRepository->find($id);

        if (empty($carCondition)) {
            return $this->sendError('Car Condition not found');
        }

        $carCondition->delete();

        return $this->sendSuccess('Car Condition deleted successfully');
    }
}
