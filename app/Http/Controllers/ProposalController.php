<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProposalRequest;
use App\Http\Requests\UpdateProposalRequest;
use App\Repositories\ProposalRepository;
use App\Repositories\FinancingRepository;
use App\Repositories\FinancingProposalRepository;
use App\Repositories\ProposalStateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\FinancingProposal;

use Flash;
use Response;
use Illuminate\Support\Facades\Auth;



class ProposalController extends AppBaseController
{
    /** @var  ProposalRepository */
    private $proposalRepository;
    private $financingRepository;
    private $proposalStateRepository;

    public function __construct(ProposalRepository $proposalRepo, FinancingRepository $financingRepo, FinancingProposalRepository $financingProposalRepo, ProposalStateRepository $proposalStateRepo)
    {
        $this->proposalRepository = $proposalRepo;
        $this->financingRepository = $financingRepo;
        $this->financingProposalRepository = $financingProposalRepo;
        $this->proposalStateRepository = $proposalStateRepo;
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

        $states = $this->proposalStateRepository->all();

        // $proposals = $this->proposalRepository->all();

        return view('proposals.index')
            ->with('proposals', $proposals)
            ->with('states', $states);
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
        $financings = $this->financingRepository->all();
        // $financingproposal = $this->financingProposalRepository->find($id);
        $financingsproposal = FinancingProposal::where('proposal_id', $id)->get();
        // dd($financingsproposal);

        if (empty($proposal)) {
            Flash::error('Proposal not found');

            return redirect(route('proposals.index'));
        }

        return view('proposals.edit')
            ->with('proposal', $proposal)
            ->with('financingsproposal', $financingsproposal)
            ->with('financings', $financings);
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

    public function closeProposal($id, Request $request)
    {
        $proposal = $this->proposalRepository->find($id);
        $proposal->state_id = $request->value;
        $proposal->save();

        return response()->json(['success'=> 'Negócio finalizado com sucesso']);
    }
}
