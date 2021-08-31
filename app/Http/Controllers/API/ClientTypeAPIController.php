<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientTypeAPIRequest;
use App\Http\Requests\API\UpdateClientTypeAPIRequest;
use App\Models\ClientType;
use App\Repositories\ClientTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ClientTypeResource;
use Response;

/**
 * Class ClientTypeController
 * @package App\Http\Controllers\API
 */

class ClientTypeAPIController extends AppBaseController
{
    /** @var  ClientTypeRepository */
    private $clientTypeRepository;

    public function __construct(ClientTypeRepository $clientTypeRepo)
    {
        $this->clientTypeRepository = $clientTypeRepo;
    }

    /**
     * Display a listing of the ClientType.
     * GET|HEAD /clientTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientTypes = $this->clientTypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ClientTypeResource::collection($clientTypes), 'Client Types retrieved successfully');
    }

    /**
     * Store a newly created ClientType in storage.
     * POST /clientTypes
     *
     * @param CreateClientTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientTypeAPIRequest $request)
    {
        $input = $request->all();

        $clientType = $this->clientTypeRepository->create($input);

        return $this->sendResponse(new ClientTypeResource($clientType), 'Client Type saved successfully');
    }

    /**
     * Display the specified ClientType.
     * GET|HEAD /clientTypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ClientType $clientType */
        $clientType = $this->clientTypeRepository->find($id);

        if (empty($clientType)) {
            return $this->sendError('Client Type not found');
        }

        return $this->sendResponse(new ClientTypeResource($clientType), 'Client Type retrieved successfully');
    }

    /**
     * Update the specified ClientType in storage.
     * PUT/PATCH /clientTypes/{id}
     *
     * @param int $id
     * @param UpdateClientTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var ClientType $clientType */
        $clientType = $this->clientTypeRepository->find($id);

        if (empty($clientType)) {
            return $this->sendError('Client Type not found');
        }

        $clientType = $this->clientTypeRepository->update($input, $id);

        return $this->sendResponse(new ClientTypeResource($clientType), 'ClientType updated successfully');
    }

    /**
     * Remove the specified ClientType from storage.
     * DELETE /clientTypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ClientType $clientType */
        $clientType = $this->clientTypeRepository->find($id);

        if (empty($clientType)) {
            return $this->sendError('Client Type not found');
        }

        $clientType->delete();

        return $this->sendSuccess('Client Type deleted successfully');
    }
}
