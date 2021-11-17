<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBusinessStudyAuthorizationRequest;
use App\Http\Requests\UpdateBusinessStudyAuthorizationRequest;
use App\Repositories\BusinessStudyAuthorizationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BusinessStudyAuthorizationController extends AppBaseController
{
    /** @var  BusinessStudyAuthorizationRepository */
    private $BusinessStudyAuthorizationRepository;

    public function __construct(BusinessStudyAuthorizationRepository $BusinessStudyAuthorizationRepo)
    {
        $this->BusinessStudyAuthorizationRepository = $BusinessStudyAuthorizationRepo;
    }

    /**
     * Display a listing of the BusinessStudyAuthorization.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $BusinessStudyAuthorizations = $this->BusinessStudyAuthorizationRepository->all();

        return view('businenss_study_authorizations.index')
            ->with('BusinessStudyAuthorizations', $BusinessStudyAuthorizations);
    }

    /**
     * Show the form for creating a new BusinessStudyAuthorization.
     *
     * @return Response
     */
    public function create()
    {
        return view('businenss_study_authorizations.create');
    }

    /**
     * Store a newly created BusinessStudyAuthorization in storage.
     *
     * @param CreateBusinessStudyAuthorizationRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessStudyAuthorizationRequest $request)
    {
        $input = $request->all();

        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->create($input);

        Flash::success('Businenss Study Authorization saved successfully.');

        return redirect(route('BusinessStudyAuthorizations.index'));
    }

    /**
     * Display the specified BusinessStudyAuthorization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->find($id);

        if (empty($BusinessStudyAuthorization)) {
            Flash::error('Businenss Study Authorization not found');

            return redirect(route('BusinessStudyAuthorizations.index'));
        }

        return view('businenss_study_authorizations.show')->with('BusinessStudyAuthorization', $BusinessStudyAuthorization);
    }

    /**
     * Show the form for editing the specified BusinessStudyAuthorization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->find($id);

        if (empty($BusinessStudyAuthorization)) {
            Flash::error('Businenss Study Authorization not found');

            return redirect(route('BusinessStudyAuthorizations.index'));
        }

        return view('businenss_study_authorizations.edit')->with('BusinessStudyAuthorization', $BusinessStudyAuthorization);
    }

    /**
     * Update the specified BusinessStudyAuthorization in storage.
     *
     * @param int $id
     * @param UpdateBusinessStudyAuthorizationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessStudyAuthorizationRequest $request)
    {
        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->find($id);

        if (empty($BusinessStudyAuthorization)) {
            Flash::error('Businenss Study Authorization not found');

            return redirect(route('BusinessStudyAuthorizations.index'));
        }

        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->update($request->all(), $id);

        Flash::success('Businenss Study Authorization updated successfully.');

        return redirect(route('BusinessStudyAuthorizations.index'));
    }

    /**
     * Remove the specified BusinessStudyAuthorization from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $BusinessStudyAuthorization = $this->BusinessStudyAuthorizationRepository->find($id);

        if (empty($BusinessStudyAuthorization)) {
            Flash::error('Businenss Study Authorization not found');

            return redirect(route('BusinessStudyAuthorizations.index'));
        }

        $this->BusinessStudyAuthorizationRepository->delete($id);

        Flash::success('Businenss Study Authorization deleted successfully.');

        return redirect(route('BusinessStudyAuthorizations.index'));
    }
}
