<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFinancingProposalAPIRequest;
use App\Http\Requests\API\UpdateFinancingProposalAPIRequest;
use App\Models\FinancingProposal;
use App\Repositories\FinancingProposalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FinancingProposalResource;
use Response;

/**
 * Class FinancingProposalController
 * @package App\Http\Controllers\API
 */

class FinancingProposalAPIController extends AppBaseController
{
    /** @var  FinancingProposalRepository */
    private $financingProposalRepository;

    public function __construct(FinancingProposalRepository $financingProposalRepo)
    {
        $this->financingProposalRepository = $financingProposalRepo;
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
        // return($inputs['Financings']);
        // DELTE RECORDS BEFORE INSERTING NEW
        // if($inputs){
        //     $deletedRows = FinancingProposal::where('proposal_id', $inputs[0]['proposal_id'])->delete();
        // }
        // $newFinancingProposal = $this->financingProposalRepository->create($inputs['Financings']);
        // return($inputs);

    //     $items = collect();
            $newFinancingProposal = $this->financingProposalRepository->create($inputs);

        // foreach ($inputs as $input){

            // ADD NEW FINANCINGS TO PROPOSAL
            // $newFinancingProposal = $this->financingProposalRepository->create($input);

            // add POS
            // dd($input); 
        if ($request->hasFile('document')) {
            $fileAdders = $newFinancingProposal->addMultipleMediaFromRequest(['document'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('financingproposal','s3');
                });
        }

    //         $items->push($newFinancingProposal);

    //    }
    // return($newFinancingProposal);

        return $this->sendResponse(new FinancingProposalResource($newFinancingProposal), 'Financing Proposal saved successfully');
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
