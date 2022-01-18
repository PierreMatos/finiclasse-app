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
        
        $inputs = $request->collect();
        $proposal = $this->proposalRepository->find($inputs['proposal_id']);
        
        // if($input){
            //     $deletedRows = FinancingProposal::where('proposal_id', $input['proposal_id'])->delete();
            // }
            foreach ($inputs['checked'] as $checked) {
                
            $financingProposal = FinancingProposal::where('proposal_id', $inputs['proposal_id'])->where('financing_id', $checked);

                if ($financingProposal->exists()){
                    if ($request->hasFile('document')){
                        $newFinancingProposal = $financingProposal->first();
                        $newFinancingProposal->delete();
                        $newFinancingProposal->clearMediaCollection('financingproposal','s3');
                    }
                }
                // ((!($financingProposal->exists()))) elseif
                else{
        
                    $newFinancingProposal = $this->financingProposalRepository->create(['proposal_id'=>$inputs['proposal_id'], 'financing_id'=>$checked]);
        
                }
        
                if ($request->hasFile('document') && isset($newFinancingProposal)) {
                    $fileAdders = $newFinancingProposal->addMultipleMediaFromRequest(['document'])
                        ->each(function ($fileAdder) {
                            $fileAdder->toMediaCollection('financingproposal','s3');
                        });
                }


        }

        if($inputs['checked'] === 'false'){
            $deletedRows = FinancingProposal::where('proposal_id', $inputs['proposal_id'])
            ->where('financing_id', $inputs['financing_id'])->forceDelete();
        }

        

        // if(((FinancingProposal::where('proposal_id', $inputs['proposal_id'])->where('financing_id', $inputs['financing_id'])->exists() === false))){
            // $proposal->financings()->syncWithoutDetaching($inputs['financing_id']);
            // $newFinancingProposal = $this->financingProposalRepository->create($inputs);
            // $request->collect('financing_id')->each(function ($proposalID) {
                // $financing = $this->financingRepository->find($financings);
                // $newFinancingProposal = $this->financingProposalRepository->create(['financing_id'=>$financings],['proposal_id',$proposal]);
    
            // });
        // }

        

        // dd($request->all());
        // $proposal->financings()->sync($inputs['financing_id']);


        // $proposal->financings()->sync($financings);

        // $financingProposal = $this->financingProposalRepository->create($input);

        // dd($inputs['proposal_id']);
        // $newFinancingProposal = $this->financingProposalRepository->find($inputs['financing_id']);
        
        // if ($request->hasFile('document')  ) {
        //     // add Document
        //     $newFinancingProposal = FinancingProposal::where('proposal_id', $inputs['proposal_id'])->where('financing_id',$inputs['financing_id'])->first();
        //     // dd($newFinancingProposal);    
        //     $fileAdders = $newFinancingProposal->addMultipleMediaFromRequest(['document'])
        //         ->each(function ($fileAdder) {
        //         $fileAdder->toMediaCollection('financingproposal','s3');
        //     });

        // }

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
