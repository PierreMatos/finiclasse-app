<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFinancingProposalRequest;
use App\Http\Requests\UpdateFinancingProposalRequest;
use App\Repositories\FinancingProposalRepository;
use App\Repositories\FinancingRepository;
use App\Repositories\ProposalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\FinancingProposal;
use Flash;
use Response;

class FinancingProposalController extends AppBaseController
{
    /** @var  FinancingProposalRepository */
    private $financingProposalRepository;
    private $proposalRepository;

    public function __construct(FinancingProposalRepository $financingProposalRepo, ProposalRepository $proposalRepo, FinancingRepository $financingRepo)
    {
        $this->financingProposalRepository = $financingProposalRepo;
        $this->financingRepository = $financingRepo;
        $this->proposalRepository = $proposalRepo;
    }

    /**
     * Display a listing of the FinancingProposal.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $financingProposals = $this->financingProposalRepository->all();

        return view('financing_proposals.index')
            ->with('financingProposals', $financingProposals);
    }

    /**
     * Show the form for creating a new FinancingProposal.
     *
     * @return Response
     */
    public function create()
    {
        return view('financing_proposals.create');
    }

    /**
     * Store a newly created FinancingProposal in storage.
     *
     * @param CreateFinancingProposalRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // $input = $request->all();

        $input = $request->collect();

        $proposal = $this->proposalRepository->find($input['proposal_id']);

        // $request->collect('financing_id')->each(function ($financings, $proposal) {
        //     $financing = $this->financingRepository->find($financings);
        // });

        if($input){
            $deletedRows = FinancingProposal::where('proposal_id', $input['proposal_id'])->delete();
        }

        // $proposal->financings()->detach();

        // dd($request->all());
        $proposal->financings()->syncWithoutDetaching($input['checked']);


        // $proposal->financings()->sync($financings);

        // $financingProposal = $this->financingProposalRepository->create($input);

        // dd($request->hasFile('document'));
        if ($request->hasFile('document')) {
                // add Document
                $fileAdders = $newFinancingProposal->addMultipleMediaFromRequest(['document'])
                ->each(function ($fileAdder) {
                $fileAdder->toMediaCollection('financingproposal','s3');
            });

        }

        Flash::success('Financing Proposal saved successfully.');

        return redirect(route('proposals.index'));
    }

    /**
     * Display the specified FinancingProposal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $financingProposal = $this->financingProposalRepository->find($id);

        if (empty($financingProposal)) {
            Flash::error('Financing Proposal not found');

            return redirect(route('financingProposals.index'));
        }

        return view('financing_proposals.show')->with('financingProposal', $financingProposal);
    }

    /**
     * Show the form for editing the specified FinancingProposal.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $financingProposal = $this->financingProposalRepository->find($id);

        if (empty($financingProposal)) {
            Flash::error('Financing Proposal not found');

            return redirect(route('financingProposals.index'));
        }

        return view('financing_proposals.edit')->with('financingProposal', $financingProposal);
    }

    /**
     * Update the specified FinancingProposal in storage.
     *
     * @param int $id
     * @param UpdateFinancingProposalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinancingProposalRequest $request)
    {
        $financingProposal = $this->financingProposalRepository->find($id);

        if (empty($financingProposal)) {
            Flash::error('Financing Proposal not found');

            return redirect(route('financingProposals.index'));
        }

        $financingProposal = $this->financingProposalRepository->update($request->all(), $id);

        Flash::success('Financing Proposal updated successfully.');

        return redirect(route('proposals.index'));
    }

    /**
     * Remove the specified FinancingProposal from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $financingProposal = $this->financingProposalRepository->find($id);

        if (empty($financingProposal)) {
            Flash::error('Financing Proposal not found');

            return redirect(route('financingProposals.index'));
        }

        $this->financingProposalRepository->delete($id);

        Flash::success('Financing Proposal deleted successfully.');

        return redirect(route('financingProposals.index'));
    }
}
