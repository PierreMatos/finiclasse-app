<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBenefitsProposalsAPIRequest;
use App\Http\Requests\API\UpdateBenefitsProposalsAPIRequest;
use App\Models\BenefitsProposals;
use App\Repositories\BenefitsProposalsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BenefitsProposalsResource;
use App\Http\Resources\BenefitsProposalsCollection;
use Response;

/**
 * Class BenefitsProposalsController
 * @package App\Http\Controllers\API
 */

class BenefitsProposalsAPIController extends AppBaseController
{
    /** @var  BenefitsProposalsRepository */
    private $benefitsProposalsRepository;

    public function __construct(BenefitsProposalsRepository $benefitsProposalsRepo)
    {
        $this->benefitsProposalsRepository = $benefitsProposalsRepo;
    }

    /**
     * Display a listing of the BenefitsProposals.
     * GET|HEAD /benefitsProposals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $benefitsProposals = $this->benefitsProposalsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        // return $benefitsProposals;
        return $this->sendResponse(BenefitsProposalsResource::collection($benefitsProposals), 'Benefits Proposals retrieved successfully');
    }

    /**
     * Store a newly created BenefitsProposals in storage.
     * POST /benefitsProposals
     *
     * @param CreateBenefitsProposalsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBenefitsProposalsAPIRequest $request)
    {
        $inputs = $request->all();

        // DELTE RECORDS BEFORE INSERTING NEW
        $deletedRows = BenefitsProposals::where('proposal_id', $inputs[0]['proposal_id'])->delete();

        $items = collect();

        foreach ($inputs as $input){

            $benefitsProposals = $this->benefitsProposalsRepository->create($input);

            $items->push($benefitsProposals);

       }

        return $this->sendResponse(new BenefitsProposalsCollection($items), 'Benefits Proposals created successfully');

    }

    /**
     * Display the specified BenefitsProposals.
     * GET|HEAD /benefitsProposals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BenefitsProposals $benefitsProposals */
        $benefitsProposals = $this->benefitsProposalsRepository->find($id);

        if (empty($benefitsProposals)) {
            return $this->sendError('Benefits Proposals not found');
        }

        return $this->sendResponse(new BenefitsProposalsResource($benefitsProposals), 'Benefits Proposals retrieved successfully');
    }

    /**
     * Update the specified BenefitsProposals in storage.
     * PUT/PATCH /benefitsProposals/{id}
     *
     * @param int $id
     * @param UpdateBenefitsProposalsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBenefitsProposalsAPIRequest $request)
    {
        $input = $request->all();

        /** @var BenefitsProposals $benefitsProposals */
        $benefitsProposals = $this->benefitsProposalsRepository->find($id);

        if (empty($benefitsProposals)) {
            return $this->sendError('Benefits Proposals not found');
        }

        $benefitsProposals = $this->benefitsProposalsRepository->update($input, $id);

        return $this->sendResponse(new BenefitsProposalsResource($benefitsProposals), 'BenefitsProposals updated successfully');
    }

    /**
     * Remove the specified BenefitsProposals from storage.
     * DELETE /benefitsProposals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BenefitsProposals $benefitsProposals */
        $benefitsProposals = $this->benefitsProposalsRepository->find($id);

        if (empty($benefitsProposals)) {
            return $this->sendError('Benefits Proposals not found');
        }

        $benefitsProposals->delete();

        return $this->sendSuccess('Benefits Proposals deleted successfully');
    }
}
