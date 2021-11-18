<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessStudyAuthorizationAPIRequest;
use App\Http\Requests\API\UpdateBusinessStudyAuthorizationAPIRequest;
use App\Models\BusinessStudyAuthorization;
use App\Repositories\BusinessStudyAuthorizationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BusinessStudyAuthorizationResource;
use Response;

/**
 * Class BusinessStudyAuthorizationController
 * @package App\Http\Controllers\API
 */

class BusinessStudyAuthorizationAPIController extends AppBaseController
{
    /** @var  BusinessStudyAuthorizationRepository */
    private $BusinessStudyAuthorizationRepository;

    public function __construct(BusinessStudyAuthorizationRepository $BusinessStudyAuthorizationRepo)
    {
        $this->BusinessStudyAuthorizationRepository = $BusinessStudyAuthorizationRepo;
    }

    /**
     * Display a listing of the BusinessStudyAuthorization.
     * GET|HEAD /BusinessStudyAuthorizations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $BusinessStudyAuthorizations = $this->BusinessStudyAuthorizationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BusinessStudyAuthorizationResource::collection($BusinessStudyAuthorizations), 'Businenss Study Authorizations retrieved successfully');
    }

    /**
     * Store a newly created BusinessStudyAuthorization in storage.
     * POST /BusinessStudyAuthorizations
     *
     * @param CreateBusinessStudyAuthorizationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessStudyAuthorizationAPIRequest $request)
    {
        $input = $request->all();

        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->create($input);

        return $this->sendResponse(new BusinessStudyAuthorizationResource($BusinessStudyAuthorization), 'Businenss Study Authorization saved successfully');
    }

    /**
     * Display the specified BusinessStudyAuthorization.
     * GET|HEAD /BusinessStudyAuthorizations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BusinessStudyAuthorization $BusinessStudyAuthorization */
        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->find($id);

        if (empty($BusinessStudyAuthorization)) {
            return $this->sendError('Businenss Study Authorization not found');
        }

        return $this->sendResponse(new BusinessStudyAuthorizationResource($BusinessStudyAuthorization), 'Businenss Study Authorization retrieved successfully');
    }

    /**
     * Update the specified BusinessStudyAuthorization in storage.
     * PUT/PATCH /BusinessStudyAuthorizations/{id}
     *
     * @param int $id
     * @param UpdateBusinessStudyAuthorizationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessStudyAuthorizationAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessStudyAuthorization $BusinessStudyAuthorization */
        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->find($id);

        if (empty($BusinessStudyAuthorization)) {
            return $this->sendError('Businenss Study Authorization not found');
        }

        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->update($input, $id);

        return $this->sendResponse(new BusinessStudyAuthorizationResource($BusinessStudyAuthorization), 'BusinessStudyAuthorization updated successfully');
    }

    /**
     * Remove the specified BusinessStudyAuthorization from storage.
     * DELETE /BusinessStudyAuthorizations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BusinessStudyAuthorization $BusinessStudyAuthorization */
        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->find($id);

        if (empty($BusinessStudyAuthorization)) {
            return $this->sendError('Businenss Study Authorization not found');
        }

        $BusinessStudyAuthorization->delete();

        return $this->sendSuccess('Businenss Study Authorization deleted successfully');
    }
}
