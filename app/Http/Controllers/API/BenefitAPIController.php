<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBenefitAPIRequest;
use App\Http\Requests\API\UpdateBenefitAPIRequest;
use App\Models\Benefit;
use App\Repositories\BenefitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BenefitResource;
use Response;

/**
 * Class BenefitController
 * @package App\Http\Controllers\API
 */

class BenefitAPIController extends AppBaseController
{
    /** @var  BenefitRepository */
    private $benefitRepository;

    public function __construct(BenefitRepository $benefitRepo)
    {
        $this->benefitRepository = $benefitRepo;
    }

    /**
     * Display a listing of the Benefit.
     * GET|HEAD /benefits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $benefits = $this->benefitRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BenefitResource::collection($benefits), 'Benefits retrieved successfully');
    }

    /**
     * Store a newly created Benefit in storage.
     * POST /benefits
     *
     * @param CreateBenefitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBenefitAPIRequest $request)
    {
        $input = $request->all();

        $benefit = $this->benefitRepository->create($input);

        return $this->sendResponse(new BenefitResource($benefit), 'Benefit saved successfully');
    }

    /**
     * Display the specified Benefit.
     * GET|HEAD /benefits/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Benefit $benefit */
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            return $this->sendError('Benefit not found');
        }

        return $this->sendResponse(new BenefitResource($benefit), 'Benefit retrieved successfully');
    }

    /**
     * Update the specified Benefit in storage.
     * PUT/PATCH /benefits/{id}
     *
     * @param int $id
     * @param UpdateBenefitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBenefitAPIRequest $request)
    {
        $input = $request->all();

        /** @var Benefit $benefit */
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            return $this->sendError('Benefit not found');
        }

        $benefit = $this->benefitRepository->update($input, $id);

        return $this->sendResponse(new BenefitResource($benefit), 'Benefit updated successfully');
    }

    /**
     * Remove the specified Benefit from storage.
     * DELETE /benefits/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Benefit $benefit */
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            return $this->sendError('Benefit not found');
        }

        $benefit->delete();

        return $this->sendSuccess('Benefit deleted successfully');
    }
}
