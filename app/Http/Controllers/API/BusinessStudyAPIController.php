<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessStudyAPIRequest;
use App\Http\Requests\API\UpdateBusinessStudyAPIRequest;
use App\Models\BusinessStudy;
use App\Repositories\BusinessStudyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BusinessStudyResource;
use Response;

/**
 * Class BusinessStudyController
 * @package App\Http\Controllers\API
 */

class BusinessStudyAPIController extends AppBaseController
{
    /** @var  BusinessStudyRepository */
    private $businessStudyRepository;

    public function __construct(BusinessStudyRepository $businessStudyRepo)
    {
        $this->businessStudyRepository = $businessStudyRepo;
    }

    /**
     * Display a listing of the BusinessStudy.
     * GET|HEAD /businessStudies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $businessStudies = $this->businessStudyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return BusinessStudy::all();    
        return $this->sendResponse(BusinessStudyResource::collection($businessStudies), 'Business Studies retrieved successfully');
    }

    /**
     * Store a newly created BusinessStudy in storage.
     * POST /businessStudies
     *
     * @param CreateBusinessStudyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessStudyAPIRequest $request)
    {
        $input = $request->all();

        $businessStudy = $this->businessStudyRepository->create($input);

        return $this->sendResponse(new BusinessStudyResource($businessStudy), 'Business Study saved successfully');
    }

    /**
     * Display the specified BusinessStudy.
     * GET|HEAD /businessStudies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BusinessStudy $businessStudy */
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            return $this->sendError('Business Study not found');
        }

        return $this->sendResponse(new BusinessStudyResource($businessStudy), 'Business Study retrieved successfully');
    }

    /**
     * Update the specified BusinessStudy in storage.
     * PUT/PATCH /businessStudies/{id}
     *
     * @param int $id
     * @param UpdateBusinessStudyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessStudyAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessStudy $businessStudy */
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            return $this->sendError('Business Study not found');
        }

        $businessStudy = $this->businessStudyRepository->update($input, $id);

        return $this->sendResponse(new BusinessStudyResource($businessStudy), 'BusinessStudy updated successfully');
    }

    /**
     * Remove the specified BusinessStudy from storage.
     * DELETE /businessStudies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BusinessStudy $businessStudy */
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            return $this->sendError('Business Study not found');
        }

        $businessStudy->delete();

        return $this->sendSuccess('Business Study deleted successfully');
    }
}
