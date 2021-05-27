<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBusinenssStudyAuthorizationRequest;
use App\Http\Requests\UpdateBusinenssStudyAuthorizationRequest;
use App\Repositories\BusinenssStudyAuthorizationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BusinenssStudyAuthorizationController extends AppBaseController
{
    /** @var  BusinenssStudyAuthorizationRepository */
    private $businenssStudyAuthorizationRepository;

    public function __construct(BusinenssStudyAuthorizationRepository $businenssStudyAuthorizationRepo)
    {
        $this->businenssStudyAuthorizationRepository = $businenssStudyAuthorizationRepo;
    }

    /**
     * Display a listing of the BusinenssStudyAuthorization.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $businenssStudyAuthorizations = $this->businenssStudyAuthorizationRepository->all();

        return view('businenss_study_authorizations.index')
            ->with('businenssStudyAuthorizations', $businenssStudyAuthorizations);
    }

    /**
     * Show the form for creating a new BusinenssStudyAuthorization.
     *
     * @return Response
     */
    public function create()
    {
        return view('businenss_study_authorizations.create');
    }

    /**
     * Store a newly created BusinenssStudyAuthorization in storage.
     *
     * @param CreateBusinenssStudyAuthorizationRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinenssStudyAuthorizationRequest $request)
    {
        $input = $request->all();

        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->create($input);

        Flash::success('Businenss Study Authorization saved successfully.');

        return redirect(route('businenssStudyAuthorizations.index'));
    }

    /**
     * Display the specified BusinenssStudyAuthorization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->find($id);

        if (empty($businenssStudyAuthorization)) {
            Flash::error('Businenss Study Authorization not found');

            return redirect(route('businenssStudyAuthorizations.index'));
        }

        return view('businenss_study_authorizations.show')->with('businenssStudyAuthorization', $businenssStudyAuthorization);
    }

    /**
     * Show the form for editing the specified BusinenssStudyAuthorization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->find($id);

        if (empty($businenssStudyAuthorization)) {
            Flash::error('Businenss Study Authorization not found');

            return redirect(route('businenssStudyAuthorizations.index'));
        }

        return view('businenss_study_authorizations.edit')->with('businenssStudyAuthorization', $businenssStudyAuthorization);
    }

    /**
     * Update the specified BusinenssStudyAuthorization in storage.
     *
     * @param int $id
     * @param UpdateBusinenssStudyAuthorizationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinenssStudyAuthorizationRequest $request)
    {
        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->find($id);

        if (empty($businenssStudyAuthorization)) {
            Flash::error('Businenss Study Authorization not found');

            return redirect(route('businenssStudyAuthorizations.index'));
        }

        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->update($request->all(), $id);

        Flash::success('Businenss Study Authorization updated successfully.');

        return redirect(route('businenssStudyAuthorizations.index'));
    }

    /**
     * Remove the specified BusinenssStudyAuthorization from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businenssStudyAuthorization = $this->businenssStudyAuthorizationRepository->find($id);

        if (empty($businenssStudyAuthorization)) {
            Flash::error('Businenss Study Authorization not found');

            return redirect(route('businenssStudyAuthorizations.index'));
        }

        $this->businenssStudyAuthorizationRepository->delete($id);

        Flash::success('Businenss Study Authorization deleted successfully.');

        return redirect(route('businenssStudyAuthorizations.index'));
    }
}
