<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFinancingProposalAPIRequest;
use App\Http\Requests\API\UpdateFinancingProposalAPIRequest;
use App\Models\FinancingProposal;
use App\Repositories\FinancingProposalRepository;
use App\Repositories\ProposalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FinancingProposalResource;
use App\Http\Resources\ProposalResource;
use Response;

/**
 * Class FinancingProposalController
 * @package App\Http\Controllers\API
 */

class FinancingProposalAPIController extends AppBaseController
{
    /** @var  FinancingProposalRepository */
    private $financingProposalRepository;
    private $proposalRepository;

    public function __construct(FinancingProposalRepository $financingProposalRepo, ProposalRepository $proposalRepo)
    {
        $this->financingProposalRepository = $financingProposalRepo;
        $this->proposalRepository = $proposalRepo;
    }

    /**
     * Display a listing of the FinancingProposal.
     * GET|HEAD /financingProposals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $financingProposals = $this->financingProposalRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FinancingProposalResource::collection($financingProposals), 'Financing Proposals retrieved successfully');
    }

    /**
     * Store a newly created FinancingProposal in storage.
     * POST /financingProposals
     *
     * @param CreateFinancingProposalAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $inputs = $request->all();

        $proposal = $this->proposalRepository->find($inputs['proposal_id']);

        // $proposal->financings()->delete();
        // DELTE RECORDS BEFORE INSERTING NEW
        // if($inputs){
        //     $deletedRows = FinancingProposal::where('proposal_id', $inputs['proposal_id'])->delete();
        // }

        // $proposal->financings()->detach();
        // $proposal->financings()->sync($inputs['financing_id']);
        // dd($inputs['checked']);
        if($inputs['checked'] === 'true'){
            $proposal->financings()->syncWithoutDetaching($inputs['financing_id']);
        }
        if($inputs['checked'] === 'false'){
            $deletedRows = FinancingProposal::where('proposal_id', $inputs['proposal_id'])->delete();
        }
        // $newFinancingProposal = $this->financingProposalRepository->create($inputs['financing_id']);

            // add POS
        if ($request->hasFile('document')) {
            $fileAdders = $newFinancingProposal->addMultipleMediaFromRequest(['document'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('financingproposal','s3');
                });
        }

    //         $items->push($newFinancingProposal);

    //    }
    // return($newFinancingProposal);

        return $this->sendResponse(new ProposalResource($proposal), 'Financing Proposal saved successfully');
    }

    /**
     * Display the specified FinancingProposal.
     * GET|HEAD /financingProposals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FinancingProposal $financingProposal */
        $financingProposal = $this->financingProposalRepository->find($id);

        if (empty($financingProposal)) {
            return $this->sendError('Financing Proposal not found');
        }

        return $this->sendResponse(new FinancingProposalResource($financingProposal), 'Financing Proposal retrieved successfully');
    }

    /**
     * Update the specified FinancingProposal in storage.
     * PUT/PATCH /financingProposals/{id}
     *
     * @param int $id
     * @param UpdateFinancingProposalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinancingProposalAPIRequest $request)
    {
        $input = $request->all();

        /** @var FinancingProposal $financingProposal */
        $financingProposal = $this->financingProposalRepository->find($id);

        if (empty($financingProposal)) {
            return $this->sendError('Financing Proposal not found');
        }

        $financingProposal = $this->financingProposalRepository->update($input, $id);

        return $this->sendResponse(new FinancingProposalResource($financingProposal), 'FinancingProposal updated successfully');
    }

    /**
     * Remove the specified FinancingProposal from storage.
     * DELETE /financingProposals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FinancingProposal $financingProposal */
        $financingProposal = $this->financingProposalRepository->find($id);

        if (empty($financingProposal)) {
            return $this->sendError('Financing Proposal not found');
        }

        $financingProposal->delete();

        return $this->sendSuccess('Financing Proposal deleted successfully');
    }
}
