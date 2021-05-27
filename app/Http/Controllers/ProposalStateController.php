<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProposalStateRequest;
use App\Http\Requests\UpdateProposalStateRequest;
use App\Repositories\ProposalStateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProposalStateController extends AppBaseController
{
    /** @var  ProposalStateRepository */
    private $proposalStateRepository;

    public function __construct(ProposalStateRepository $proposalStateRepo)
    {
        $this->proposalStateRepository = $proposalStateRepo;
    }

    /**
     * Display a listing of the ProposalState.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proposalStates = $this->proposalStateRepository->all();

        return view('proposal_states.index')
            ->with('proposalStates', $proposalStates);
    }

    /**
     * Show the form for creating a new ProposalState.
     *
     * @return Response
     */
    public function create()
    {
        return view('proposal_states.create');
    }

    /**
     * Store a newly created ProposalState in storage.
     *
     * @param CreateProposalStateRequest $request
     *
     * @return Response
     */
    public function store(CreateProposalStateRequest $request)
    {
        $input = $request->all();

        $proposalState = $this->proposalStateRepository->create($input);

        Flash::success('Proposal State saved successfully.');

        return redirect(route('proposalStates.index'));
    }

    /**
     * Display the specified ProposalState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proposalState = $this->proposalStateRepository->find($id);

        if (empty($proposalState)) {
            Flash::error('Proposal State not found');

            return redirect(route('proposalStates.index'));
        }

        return view('proposal_states.show')->with('proposalState', $proposalState);
    }

    /**
     * Show the form for editing the specified ProposalState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proposalState = $this->proposalStateRepository->find($id);

        if (empty($proposalState)) {
            Flash::error('Proposal State not found');

            return redirect(route('proposalStates.index'));
        }

        return view('proposal_states.edit')->with('proposalState', $proposalState);
    }

    /**
     * Update the specified ProposalState in storage.
     *
     * @param int $id
     * @param UpdateProposalStateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProposalStateRequest $request)
    {
        $proposalState = $this->proposalStateRepository->find($id);

        if (empty($proposalState)) {
            Flash::error('Proposal State not found');

            return redirect(route('proposalStates.index'));
        }

        $proposalState = $this->proposalStateRepository->update($request->all(), $id);

        Flash::success('Proposal State updated successfully.');

        return redirect(route('proposalStates.index'));
    }

    /**
     * Remove the specified ProposalState from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proposalState = $this->proposalStateRepository->find($id);

        if (empty($proposalState)) {
            Flash::error('Proposal State not found');

            return redirect(route('proposalStates.index'));
        }

        $this->proposalStateRepository->delete($id);

        Flash::success('Proposal State deleted successfully.');

        return redirect(route('proposalStates.index'));
    }
}
