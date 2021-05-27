<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProposalStateAPIRequest;
use App\Http\Requests\API\UpdateProposalStateAPIRequest;
use App\Models\ProposalState;
use App\Repositories\ProposalStateRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProposalStateResource;
use Response;

/**
 * Class ProposalStateController
 * @package App\Http\Controllers\API
 */

class ProposalStateAPIController extends AppBaseController
{
    /** @var  ProposalStateRepository */
    private $proposalStateRepository;

    public function __construct(ProposalStateRepository $proposalStateRepo)
    {
        $this->proposalStateRepository = $proposalStateRepo;
    }

    /**
     * Display a listing of the ProposalState.
     * GET|HEAD /proposalStates
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $proposalStates = $this->proposalStateRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProposalStateResource::collection($proposalStates), 'Proposal States retrieved successfully');
    }

    /**
     * Store a newly created ProposalState in storage.
     * POST /proposalStates
     *
     * @param CreateProposalStateAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProposalStateAPIRequest $request)
    {
        $input = $request->all();

        $proposalState = $this->proposalStateRepository->create($input);

        return $this->sendResponse(new ProposalStateResource($proposalState), 'Proposal State saved successfully');
    }

    /**
     * Display the specified ProposalState.
     * GET|HEAD /proposalStates/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProposalState $proposalState */
        $proposalState = $this->proposalStateRepository->find($id);

        if (empty($proposalState)) {
            return $this->sendError('Proposal State not found');
        }

        return $this->sendResponse(new ProposalStateResource($proposalState), 'Proposal State retrieved successfully');
    }

    /**
     * Update the specified ProposalState in storage.
     * PUT/PATCH /proposalStates/{id}
     *
     * @param int $id
     * @param UpdateProposalStateAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProposalStateAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProposalState $proposalState */
        $proposalState = $this->proposalStateRepository->find($id);

        if (empty($proposalState)) {
            return $this->sendError('Proposal State not found');
        }

        $proposalState = $this->proposalStateRepository->update($input, $id);

        return $this->sendResponse(new ProposalStateResource($proposalState), 'ProposalState updated successfully');
    }

    /**
     * Remove the specified ProposalState from storage.
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
        /** @var ProposalState $proposalState */
        $proposalState = $this->proposalStateRepository->find($id);

        if (empty($proposalState)) {
            return $this->sendError('Proposal State not found');
        }

        $proposalState->delete();

        return $this->sendSuccess('Proposal State deleted successfully');
    }
}
