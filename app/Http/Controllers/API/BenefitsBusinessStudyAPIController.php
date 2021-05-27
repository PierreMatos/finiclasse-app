<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBenefitsBusinessStudyAPIRequest;
use App\Http\Requests\API\UpdateBenefitsBusinessStudyAPIRequest;
use App\Models\BenefitsBusinessStudy;
use App\Repositories\BenefitsBusinessStudyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BenefitsBusinessStudyResource;
use Response;

/**
 * Class BenefitsBusinessStudyController
 * @package App\Http\Controllers\API
 */

class BenefitsBusinessStudyAPIController extends AppBaseController
{
    /** @var  BenefitsBusinessStudyRepository */
    private $benefitsBusinessStudyRepository;

    public function __construct(BenefitsBusinessStudyRepository $benefitsBusinessStudyRepo)
    {
        $this->benefitsBusinessStudyRepository = $benefitsBusinessStudyRepo;
    }

    /**
     * Display a listing of the BenefitsBusinessStudy.
     * GET|HEAD /benefitsBusinessStudies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $benefitsBusinessStudies = $this->benefitsBusinessStudyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BenefitsBusinessStudyResource::collection($benefitsBusinessStudies), 'Benefits Business Studies retrieved successfully');
    }

    /**
     * Store a newly created BenefitsBusinessStudy in storage.
     * POST /benefitsBusinessStudies
     *
     * @param CreateBenefitsBusinessStudyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBenefitsBusinessStudyAPIRequest $request)
    {
        $input = $request->all();

        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->create($input);

        return $this->sendResponse(new BenefitsBusinessStudyResource($benefitsBusinessStudy), 'Benefits Business Study saved successfully');
    }

    /**
     * Display the specified BenefitsBusinessStudy.
     * GET|HEAD /benefitsBusinessStudies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BenefitsBusinessStudy $benefitsBusinessStudy */
        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->find($id);

        if (empty($benefitsBusinessStudy)) {
            return $this->sendError('Benefits Business Study not found');
        }

        return $this->sendResponse(new BenefitsBusinessStudyResource($benefitsBusinessStudy), 'Benefits Business Study retrieved successfully');
    }

    /**
     * Update the specified BenefitsBusinessStudy in storage.
     * PUT/PATCH /benefitsBusinessStudies/{id}
     *
     * @param int $id
     * @param UpdateBenefitsBusinessStudyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBenefitsBusinessStudyAPIRequest $request)
    {
        $input = $request->all();

        /** @var BenefitsBusinessStudy $benefitsBusinessStudy */
        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->find($id);

        if (empty($benefitsBusinessStudy)) {
            return $this->sendError('Benefits Business Study not found');
        }

        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->update($input, $id);

        return $this->sendResponse(new BenefitsBusinessStudyResource($benefitsBusinessStudy), 'BenefitsBusinessStudy updated successfully');
    }

    /**
     * Remove the specified BenefitsBusinessStudy from storage.
     * DELETE /benefitsBusinessStudies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BenefitsBusinessStudy $benefitsBusinessStudy */
        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->find($id);

        if (empty($benefitsBusinessStudy)) {
            return $this->sendError('Benefits Business Study not found');
        }

        $benefitsBusinessStudy->delete();

        return $this->sendSuccess('Benefits Business Study deleted successfully');
    }
}
