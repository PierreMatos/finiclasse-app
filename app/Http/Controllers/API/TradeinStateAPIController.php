<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTradeinStateAPIRequest;
use App\Http\Requests\API\UpdateTradeinStateAPIRequest;
use App\Models\TradeinState;
use App\Repositories\TradeinStateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TradeinStateResource;
use Response;

/**
 * Class TradeinStateController
 * @package App\Http\Controllers\API
 */

class TradeinStateAPIController extends AppBaseController
{
    /** @var  TradeinStateRepository */
    private $tradeinStateRepository;

    public function __construct(TradeinStateRepository $tradeinStateRepo)
    {
        $this->tradeinStateRepository = $tradeinStateRepo;
    }

    /**
     * Display a listing of the TradeinState.
     * GET|HEAD /tradeinStates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tradeinStates = $this->tradeinStateRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(TradeinStateResource::collection($tradeinStates), 'Tradein States retrieved successfully');
    }

    /**
     * Store a newly created TradeinState in storage.
     * POST /tradeinStates
     *
     * @param CreateTradeinStateAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTradeinStateAPIRequest $request)
    {
        $input = $request->all();

        $tradeinState = $this->tradeinStateRepository->create($input);

        return $this->sendResponse(new TradeinStateResource($tradeinState), 'Tradein State saved successfully');
    }

    /**
     * Display the specified TradeinState.
     * GET|HEAD /tradeinStates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TradeinState $tradeinState */
        $tradeinState = $this->tradeinStateRepository->find($id);

        if (empty($tradeinState)) {
            return $this->sendError('Tradein State not found');
        }

        return $this->sendResponse(new TradeinStateResource($tradeinState), 'Tradein State retrieved successfully');
    }

    /**
     * Update the specified TradeinState in storage.
     * PUT/PATCH /tradeinStates/{id}
     *
     * @param int $id
     * @param UpdateTradeinStateAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTradeinStateAPIRequest $request)
    {
        $input = $request->all();

        /** @var TradeinState $tradeinState */
        $tradeinState = $this->tradeinStateRepository->find($id);

        if (empty($tradeinState)) {
            return $this->sendError('Tradein State not found');
        }

        $tradeinState = $this->tradeinStateRepository->update($input, $id);

        return $this->sendResponse(new TradeinStateResource($tradeinState), 'TradeinState updated successfully');
    }

    /**
     * Remove the specified TradeinState from storage.
     * DELETE /tradeinStates/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TradeinState $tradeinState */
        $tradeinState = $this->tradeinStateRepository->find($id);

        if (empty($tradeinState)) {
            return $this->sendError('Tradein State not found');
        }

        $tradeinState->delete();

        return $this->sendSuccess('Tradein State deleted successfully');
    }
}
