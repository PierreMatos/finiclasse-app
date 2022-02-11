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
        $input = $request->all();
        $inputs = $request->collect();
        $proposal = $this->proposalRepository->find($inputs['proposal_id']);
        $document = $request->file('document');


        if (array_key_exists('checked', $input)){

            foreach ($input['checked'] as $key=>$checked) {
            $financingProposal = FinancingProposal::where('proposal_id', $inputs['proposal_id'])->where('financing_id', $key);

            //Delete previous if exists
                if ($financingProposal->exists()){
                    $oldDoc = $financingProposal->first()->getFirstMediaUrl('financingproposal');
                    if ($request->hasFile('checked') && $oldDoc != $request->hasFile('checked') ){
                        // dd($financingProposal->first()->getFirstMediaUrl('financingproposal'));
                        $newFinancingProposal = $financingProposal->first();
                        // $newFinancingProposal->delete();
                        $newFinancingProposal->clearMediaCollection('financingproposal','s3');
                    }
                }
                // if doesen't exists, create new
                else{
        
                    // dd('cria');
                    $newFinancingProposal = $this->financingProposalRepository->create(['proposal_id'=>$inputs['proposal_id'], 'financing_id'=>$key]);
        
                }
        
                //if has file, upload file
                // $request->hasFile('checked') && 
                if (isset($newFinancingProposal)) {
                    // dd($checked->hasFile());
                    
                    $document = $request->file('checked');
                    // dd($input);
                    // dd($checked->isEmpty());
                    if (!(empty($document[$key])) && !(is_null($checked)) ){

                        $newFinancingProposal->addMedia($document[$key])->toMediaCollection('financingproposal', 's3');

                    }
                    
                }
        
            }
        }

            $abc=(FinancingProposal::where('proposal_id', $inputs['proposal_id'])->get());
            $def= FinancingProposal::where('proposal_id', $inputs['proposal_id'])->whereIn('financing_id', $inputs['checked'])->get();

            $dels = $abc->diff(FinancingProposal::whereIn('financing_id', $inputs['checked'])->get());
            // dd($dels);
            foreach($dels as $del){
                // dd($del->id);
                $deletedRows = $this->financingProposalRepository->find($del->id)->forceDelete();
            //     $deletedRows = FinancingProposal::where('proposal_id', $inputs['proposal_id'])
            // ->where('financing_id', $inputs['financing_id'])->forceDelete();
            }
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

        // $this->financingProposalRepository->delete($id);

        $financingProposal->clearMediaCollection('financingproposal','s3');

        Flash::success('Financing Proposal deleted successfully.');

        return redirect(route('proposals.index'));
    }
}
