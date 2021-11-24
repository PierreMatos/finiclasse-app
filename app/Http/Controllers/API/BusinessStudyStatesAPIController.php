<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessStudyStatesAPIRequest;
use App\Http\Requests\API\UpdateBusinessStudyStatesAPIRequest;
use App\Models\BusinessStudyStates;
use App\Repositories\BusinessStudyStatesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BusinessStudyStatesResource;
use Response;

/**
 * Class BusinessStudyStatesController
 * @package App\Http\Controllers\API
 */

class BusinessStudyStatesAPIController extends AppBaseController
{
    /** @var  BusinessStudyStatesRepository */
    private $businessStudyStatesRepository;

    public function __construct(BusinessStudyStatesRepository $businessStudyStatesRepo)
    {
        $this->businessStudyStatesRepository = $businessStudyStatesRepo;
    }

    /**
     * Display a listing of the BusinessStudyStates.
     * GET|HEAD /businessStudyStates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $businessStudyStates = $this->businessStudyStatesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BusinessStudyStatesResource::collection($businessStudyStates), 'Business Study States retrieved successfully');
    }

    /**
     * Store a newly created BusinessStudyStates in storage.
     * POST /businessStudyStates
     *
     * @param CreateBusinessStudyStatesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessStudyStatesAPIRequest $request)
    {
        $input = $request->all();

        $businessStudyStates = $this->businessStudyStatesRepository->create($input);

        return $this->sendResponse(new BusinessStudyStatesResource($businessStudyStates), 'Business Study States saved successfully');
    }

    /**
     * Display the specified BusinessStudyStates.
     * GET|HEAD /businessStudyStates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BusinessStudyStates $businessStudyStates */
        $businessStudyStates = $this->businessStudyStatesRepository->find($id);

        if (empty($businessStudyStates)) {
            return $this->sendError('Business Study States not found');
        }

        return $this->sendResponse(new BusinessStudyStatesResource($businessStudyStates), 'Business Study States retrieved successfully');
    }

    /**
     * Update the specified BusinessStudyStates in storage.
     * PUT/PATCH /businessStudyStates/{id}
     *
     * @param int $id
     * @param UpdateBusinessStudyStatesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessStudyStatesAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessStudyStates $businessStudyStates */
        $businessStudyStates = $this->businessStudyStatesRepository->find($id);

        if (empty($businessStudyStates)) {
            return $this->sendError('Business Study States not found');
        }

        $businessStudyStates = $this->businessStudyStatesRepository->update($input, $id);

        return $this->sendResponse(new BusinessStudyStatesResource($businessStudyStates), 'BusinessStudyStates updated successfully');
    }

    /**
     * Remove the specified BusinessStudyStates from storage.
     * DELETE /businessStudyStates/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BusinessStudyStates $businessStudyStates */
        $businessStudyStates = $this->businessStudyStatesRepository->find($id);

        if (empty($businessStudyStates)) {
            return $this->sendError('Business Study States not found');
        }

        $businessStudyStates->delete();

        return $this->sendSuccess('Business Study States deleted successfully');
    }
}
