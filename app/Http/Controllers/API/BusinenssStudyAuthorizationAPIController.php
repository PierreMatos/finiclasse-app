<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinenssStudyAuthorizationAPIRequest;
use App\Http\Requests\API\UpdateBusinenssStudyAuthorizationAPIRequest;
use App\Models\BusinenssStudyAuthorization;
use App\Repositories\BusinenssStudyAuthorizationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BusinenssStudyAuthorizationResource;
use Response;

/**
 * Class BusinenssStudyAuthorizationController
 * @package App\Http\Controllers\API
 */

class BusinenssStudyAuthorizationAPIController extends AppBaseController
{
    /** @var  BusinenssStudyAuthorizationRepository */
    private $businenssStudyAuthorizationRepository;

    public function __construct(BusinenssStudyAuthorizationRepository $businenssStudyAuthorizationRepo)
    {
        $this->businenssStudyAuthorizationRepository = $businenssStudyAuthorizationRepo;
    }

    /**
     * Display a listing of the BusinenssStudyAuthorization.
     * GET|HEAD /businenssStudyAuthorizations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $businenssStudyAuthorizations = $this->businenssStudyAuthorizationRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BusinenssStudyAuthorizationResource::collection($businenssStudyAuthorizations), 'Businenss Study Authorizations retrieved successfully');
    }

    /**
     * Store a newly created BusinenssStudyAuthorization in storage.
     * POST /businenssStudyAuthorizations
     *
     * @param CreateBusinenssStudyAuthorizationAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinenssStudyAuthorizationAPIRequest $request)
    {
        $input = $request->all();

        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->create($input);

        return $this->sendResponse(new BusinenssStudyAuthorizationResource($businenssStudyAuthorization), 'Businenss Study Authorization saved successfully');
    }

    /**
     * Display the specified BusinenssStudyAuthorization.
     * GET|HEAD /businenssStudyAuthorizations/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BusinenssStudyAuthorization $businenssStudyAuthorization */
        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->find($id);

        if (empty($businenssStudyAuthorization)) {
            return $this->sendError('Businenss Study Authorization not found');
        }

        return $this->sendResponse(new BusinenssStudyAuthorizationResource($businenssStudyAuthorization), 'Businenss Study Authorization retrieved successfully');
    }

    /**
     * Update the specified BusinenssStudyAuthorization in storage.
     * PUT/PATCH /businenssStudyAuthorizations/{id}
     *
     * @param int $id
     * @param UpdateBusinenssStudyAuthorizationAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinenssStudyAuthorizationAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinenssStudyAuthorization $businenssStudyAuthorization */
        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->find($id);

        if (empty($businenssStudyAuthorization)) {
            return $this->sendError('Businenss Study Authorization not found');
        }

        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->update($input, $id);

        return $this->sendResponse(new BusinenssStudyAuthorizationResource($businenssStudyAuthorization), 'BusinenssStudyAuthorization updated successfully');
    }

    /**
     * Remove the specified BusinenssStudyAuthorization from storage.
     * DELETE /businenssStudyAuthorizations/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BusinenssStudyAuthorization $businenssStudyAuthorization */
        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->find($id);

        if (empty($businenssStudyAuthorization)) {
            return $this->sendError('Businenss Study Authorization not found');
        }

        $businenssStudyAuthorization->delete();

        return $this->sendSuccess('Businenss Study Authorization deleted successfully');
    }
}
