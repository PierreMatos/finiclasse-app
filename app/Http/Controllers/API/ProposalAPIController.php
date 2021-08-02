<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProposalAPIRequest;
use App\Http\Requests\API\UpdateProposalAPIRequest;
use App\Models\Proposal;
use App\Repositories\ProposalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProposalResource;
use App\Http\Resources\ProposalCollection;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


/**
 * Class ProposalController
 * @package App\Http\Controllers\API
 */

class ProposalAPIController extends AppBaseController
{
    /** @var  ProposalRepository */
    private $proposalRepository;

    public function __construct(ProposalRepository $proposalRepo)
    {
        $this->proposalRepository = $proposalRepo;
    }

    /**
     * Display a listing of the Proposal.
     * GET|HEAD /proposalss
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        // $pages=5;

        // if ($request->state != null) {

        //     $proposals = Proposal::where('state_id','=',$request->state)
        //     ->where('vendor_id','=',Auth::id())
        //     ->simplePaginate($pages);

        // } else {

        //     $proposals = Proposal::simplePaginate($pages);

        // }
        

        $proposals = $this->proposalRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return new ProposalCollection(Proposal::paginate());

        return $this->sendResponse(ProposalResource::collection($proposals), 'Proposals retrieved successfully');

        return $proposals->paginate(5);
        return new ProposalCollection($proposals::simplePaginate());

        // $proposals->paginate(2);
        return new ProposalResource(Proposal::paginate(2));

        return $this->sendResponse(ProposalResource::collection($proposals), 'Proposals retrieved successfully');
        return $this->sendResponse(ProposalResource::collection($proposals), 'Proposals retrieved successfully');
    }

    /**
     * Store a newly created Proposal in storage.
     * POST /proposals
     *
     * @param CreateProposalAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        
        // if (proposta completa) {
            // authorization($input->id);
        // }

        $proposal = $this->proposalRepository->create($input);

        return $this->sendResponse(new ProposalResource($proposal), 'Proposal saved successfully');
    }

    /**
     * Display the specified Proposal.
     * GET|HEAD /proposals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Proposal $proposal */
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            return $this->sendError('Proposal not found');
        }

        return $this->sendResponse(new ProposalResource($proposal), 'Proposal retrieved successfully');
    }

    /**
     * Update the specified Proposal in storage.
     * PUT/PATCH /proposals/{id}
     *
     * @param int $id
     * @param UpdateProposalAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateProposalAPIRequest $request)
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Proposal $proposal */
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            return $this->sendError('Proposal not found');
        }

        $proposal = $this->proposalRepository->update($input, $id);

        return $this->sendResponse(new ProposalResource($proposal), 'Proposal updated successfully');
    }

    /**
     * Remove the specified Proposal from storage.
     * DELETE /proposals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Proposal $proposal */
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            return $this->sendError('Proposal not found');
        }

        $proposal->delete();

        return $this->sendSuccess('Proposal deleted successfully');
    }

    public function authorization($id){

        $proposal = Proposal::find($id);
        
        $diff = $proposal->total_discount_perc;

        foreach ($authorizations as $authorization) {

            $min = $authorization->min;
            $max = $authorization->max;

            if($diff > $min && $diff < $max) {

                $proposal->authorization_id = $authorization->id;
            
            }

        }

        return $proposal;

    }
}
