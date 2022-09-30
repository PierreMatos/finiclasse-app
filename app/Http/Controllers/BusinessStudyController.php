<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBusinessStudyRequest;
use App\Http\Requests\UpdateBusinessStudyRequest;
use App\Repositories\BusinessStudyRepository;
use App\Http\Controllers\AppBaseController;
use App\Providers\PushValidatedProposal;
use App\Providers\PushProposalRequestDeny;
use App\Providers\PushProposalRequestAccept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProposalRequestDeny;
use App\Mail\ProposalRequestAccept;
use Flash;
use Response;

class BusinessStudyController extends AppBaseController
{
    /** @var  BusinessStudyRepository */
    private $businessStudyRepository;

    public function __construct(BusinessStudyRepository $businessStudyRepo)
    {
        $this->businessStudyRepository = $businessStudyRepo;
    }

    /**
     * Display a listing of the BusinessStudy.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $businessStudies = $this->businessStudyRepository->all();

        return view('business_studies.index')
            ->with('businessStudies', $businessStudies);
    }

    /**
     * Show the form for creating a new BusinessStudy.
     *
     * @return Response
     */
    public function create()
    {
        return view('business_studies.create');
    }

    /**
     * Store a newly created BusinessStudy in storage.
     *
     * @param CreateBusinessStudyRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessStudyRequest $request)
    {
        $input = $request->all();

        $businessStudy = $this->businessStudyRepository->create($input);

        Flash::success('Business Study saved successfully.');

        return redirect(route('businessStudies.index'));
    }

    /**
     * Display the specified BusinessStudy.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            Flash::error('Business Study not found');

            return redirect(route('businessStudies.index'));
        }

        return view('business_studies.show')->with('businessStudy', $businessStudy);
    }

    /**
     * Show the form for editing the specified BusinessStudy.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            Flash::error('Business Study not found');

            return redirect(route('businessStudies.index'));
        }

        return view('business_studies.edit')->with('businessStudy', $businessStudy);
    }

    /**
     * Update the specified BusinessStudy in storage.
     *
     * @param int $id
     * @param UpdateBusinessStudyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessStudyRequest $request)
    {
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            Flash::error('Business Study not found');

            return redirect(route('businessStudies.index'));
        }

        $businessStudy = $this->businessStudyRepository->update($request->all(), $id);

        Flash::success('Business Study updated successfully.');

        return redirect(route('proposals.index'));
    }

    /**
     * Remove the specified BusinessStudy from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            Flash::error('Business Study not found');

            return redirect(route('businessStudies.index'));
        }

        $this->businessStudyRepository->delete($id);

        Flash::success('Business Study deleted successfully.');

        return redirect(route('businessStudies.index'));
    }

    public function proposalRequestResponse($id, Request $request)
    {

        if ($id && $request->value) {
            $businessStudy = $this->businessStudyRepository->find($id);
            $businessStudy->business_study_authorization_id = $request->value;
            $proposal = $businessStudy->initialProposal;
            $proposal->state_id = 1;

            // $businessStudy->save();
            // $proposal->save();
        }

        //Push & Notification Validated Proposal
        if ($businessStudy->business_study_authorization_id === 4) {

            event(new PushProposalRequestAccept($proposal));

            Mail::send(new ProposalAcceptRequest($proposal));    
        }

        if ($businessStudy->business_study_authorization_id === 5) {


            event(new PushProposalRequestDeny($proposal));

            Mail::send(new ProposalRequestDeny($proposal));    
        }

        if ($businessStudy->business_study_authorization_id === 4) {
            return response()->json(['success' => 'Negócio aceite com sucesso']);
        } elseif ($businessStudy->business_study_authorization_id === 5) {
            return response()->json(['success' => 'Negócio rejeitado']);
        }
    }
}
