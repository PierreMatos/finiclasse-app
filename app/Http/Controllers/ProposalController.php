<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Repositories\ProposalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Auth;



class ProposalController extends AppBaseController
{
    /** @var  ProposalRepository */
    private $proposalRepository;

    public function __construct(ProposalRepository $proposalRepo)
    {
        $this->proposalRepository = $proposalRepo;
    }

    /**
     * Display a listing of the Proposal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $proposals = $this->proposalRepository->getProposalsByRole(Auth::user());


        // $proposals = $this->proposalRepository->all();

        return view('proposals.index')
            ->with('proposals', $proposals);
    }

    /**
     * Show the form for creating a new Proposal.
     *
     * @return Response
     */
    public function create()
    {
        return view('proposals.create');
    }

    /**
     * Store a newly created Proposal in storage.
     *
     * @param CreateProposalRequest $request
     *
     * @return Response
     */
    public function store(CreateProposalRequest $request)
    {
        $input = $request->all();

        $proposal = $this->proposalRepository->create($input);

        Flash::success('Proposal saved successfully.');

        return redirect(route('proposals.index'));
    }

    /**
     * Display the specified Proposal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            Flash::error('Proposal not found');

            return redirect(route('proposals.index'));
        }

        return view('proposals.show')->with('proposal', $proposal);
    }

    /**
     * Show the form for editing the specified Proposal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            Flash::error('Proposal not found');

            return redirect(route('proposals.index'));
        }

        return view('proposals.edit')
            ->with('proposal', $proposal);
    }

    /**
     * Update the specified Proposal in storage.
     *
     * @param int $id
     * @param UpdateProposalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProposalRequest $request)
    {
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            Flash::error('Proposal not found');

            return redirect(route('proposals.index'));
        }

        $proposal = $this->proposalRepository->update($request->all(), $id);

        Flash::success('Proposal updated successfully.');

        return redirect(route('proposals.index'));
    }

    /**
     * Remove the specified Proposal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            Flash::error('Proposal not found');

            return redirect(route('proposals.index'));
        }

        $this->proposalRepository->delete($id);

        Flash::success('Proposal deleted successfully.');

        return redirect(route('proposals.index'));
    }
}
