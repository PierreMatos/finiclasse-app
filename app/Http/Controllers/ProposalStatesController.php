<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProposalStatesRequest;
use App\Http\Requests\UpdateProposalStatesRequest;
use App\Repositories\ProposalStatesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProposalStatesController extends AppBaseController
{
    /** @var  ProposalStatesRepository */
    private $proposalStatesRepository;

    public function __construct(ProposalStatesRepository $proposalStatesRepo)
    {
        $this->proposalStatesRepository = $proposalStatesRepo;
    }

    /**
     * Display a listing of the ProposalStates.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proposalStates = $this->proposalStatesRepository->all();

        return view('proposal_states.index')
            ->with('proposalStates', $proposalStates);
    }

    /**
     * Show the form for creating a new ProposalStates.
     *
     * @return Response
     */
    public function create()
    {
        return view('proposal_states.create');
    }

    /**
     * Store a newly created ProposalStates in storage.
     *
     * @param CreateProposalStatesRequest $request
     *
     * @return Response
     */
    public function store(CreateProposalStatesRequest $request)
    {
        $input = $request->all();

        $proposalStates = $this->proposalStatesRepository->create($input);

        Flash::success('Proposal States saved successfully.');

        return redirect(route('proposalStates.index'));
    }

    /**
     * Display the specified ProposalStates.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proposalStates = $this->proposalStatesRepository->find($id);

        if (empty($proposalStates)) {
            Flash::error('Proposal States not found');

            return redirect(route('proposalStates.index'));
        }

        return view('proposal_states.show')->with('proposalStates', $proposalStates);
    }

    /**
     * Show the form for editing the specified ProposalStates.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proposalStates = $this->proposalStatesRepository->find($id);

        if (empty($proposalStates)) {
            Flash::error('Proposal States not found');

            return redirect(route('proposalStates.index'));
        }

        return view('proposal_states.edit')->with('proposalStates', $proposalStates);
    }

    /**
     * Update the specified ProposalStates in storage.
     *
     * @param int $id
     * @param UpdateProposalStatesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProposalStatesRequest $request)
    {
        $proposalStates = $this->proposalStatesRepository->find($id);

        if (empty($proposalStates)) {
            Flash::error('Proposal States not found');

            return redirect(route('proposalStates.index'));
        }

        $proposalStates = $this->proposalStatesRepository->update($request->all(), $id);

        Flash::success('Proposal States updated successfully.');

        return redirect(route('proposalStates.index'));
    }

    /**
     * Remove the specified ProposalStates from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proposalStates = $this->proposalStatesRepository->find($id);

        if (empty($proposalStates)) {
            Flash::error('Proposal States not found');

            return redirect(route('proposalStates.index'));
        }

        $this->proposalStatesRepository->delete($id);

        Flash::success('Proposal States deleted successfully.');

        return redirect(route('proposalStates.index'));
    }
}
