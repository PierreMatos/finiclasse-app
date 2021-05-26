<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProposalStatesAPIRequest;
use App\Http\Requests\API\UpdateProposalStatesAPIRequest;
use App\Models\ProposalStates;
use App\Repositories\ProposalStatesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProposalStatesResource;
use Response;

/**
 * Class ProposalStatesController
 * @package App\Http\Controllers\API
 */

class ProposalStatesAPIController extends AppBaseController
{
    /** @var  ProposalStatesRepository */
    private $proposalStatesRepository;

    public function __construct(ProposalStatesRepository $proposalStatesRepo)
    {
        $this->proposalStatesRepository = $proposalStatesRepo;
    }

    /**
     * Display a listing of the ProposalStates.
     * GET|HEAD /proposalStates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $proposalStates = $this->proposalStatesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProposalStatesResource::collection($proposalStates), 'Proposal States retrieved successfully');
    }

    /**
     * Store a newly created ProposalStates in storage.
     * POST /proposalStates
     *
     * @param CreateProposalStatesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProposalStatesAPIRequest $request)
    {
        $input = $request->all();

        $proposalStates = $this->proposalStatesRepository->create($input);

        return $this->sendResponse(new ProposalStatesResource($proposalStates), 'Proposal States saved successfully');
    }

    /**
     * Display the specified ProposalStates.
     * GET|HEAD /proposalStates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProposalStates $proposalStates */
        $proposalStates = $this->proposalStatesRepository->find($id);

        if (empty($proposalStates)) {
            return $this->sendError('Proposal States not found');
        }

        return $this->sendResponse(new ProposalStatesResource($proposalStates), 'Proposal States retrieved successfully');
    }

    /**
     * Update the specified ProposalStates in storage.
     * PUT/PATCH /proposalStates/{id}
     *
     * @param int $id
     * @param UpdateProposalStatesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProposalStatesAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProposalStates $proposalStates */
        $proposalStates = $this->proposalStatesRepository->find($id);

        if (empty($proposalStates)) {
            return $this->sendError('Proposal States not found');
        }

        $proposalStates = $this->proposalStatesRepository->update($input, $id);

        return $this->sendResponse(new ProposalStatesResource($proposalStates), 'ProposalStates updated successfully');
    }

    /**
     * Remove the specified ProposalStates from storage.
     * DELETE /proposalStates/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProposalStates $proposalStates */
        $proposalStates = $this->proposalStatesRepository->find($id);

        if (empty($proposalStates)) {
            return $this->sendError('Proposal States not found');
        }

        $proposalStates->delete();

        return $this->sendSuccess('Proposal States deleted successfully');
    }
}
