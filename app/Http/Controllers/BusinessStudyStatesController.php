<?php

namespace App\Http\Controllers;

use App\DataTables\BusinessStudyStatesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBusinessStudyStatesRequest;
use App\Http\Requests\UpdateBusinessStudyStatesRequest;
use App\Repositories\BusinessStudyStatesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Http\Request;


class BusinessStudyStatesController extends AppBaseController
{
    /** @var  BusinessStudyStatesRepository */
    private $businessStudyStatesRepository;

    public function __construct(BusinessStudyStatesRepository $businessStudyStatesRepo)
    {
        $this->businessStudyStatesRepository = $businessStudyStatesRepo;
    }

    /**
     * Display a listing of the BusinessStudyStates.
     *
     * @param BusinessStudyStatesDataTable $businessStudyStatesDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        $businessStudyStates = $this->businessStudyStatesRepository->all();

        return view('business_study_states.index')
            ->with('businessStudyStatesRepo', $businessStudyStates);
        // return $businessStudyStatesDataTable->render('business_study_states.index');
    }

    /**
     * Show the form for creating a new BusinessStudyStates.
     *
     * @return Response
     */
    public function create()
    {
        return view('business_study_states.create');
    }

    /**
     * Store a newly created BusinessStudyStates in storage.
     *
     * @param CreateBusinessStudyStatesRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessStudyStatesRequest $request)
    {
        $input = $request->all();

        $businessStudyStates = $this->businessStudyStatesRepository->create($input);

        Flash::success('Business Study States saved successfully.');

        return redirect(route('businessStudyStates.index'));
    }

    /**
     * Display the specified BusinessStudyStates.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $businessStudyStates = $this->businessStudyStatesRepository->find($id);

        if (empty($businessStudyStates)) {
            Flash::error('Business Study States not found');

            return redirect(route('businessStudyStates.index'));
        }

        return view('business_study_states.show')->with('businessStudyStates', $businessStudyStates);
    }

    /**
     * Show the form for editing the specified BusinessStudyStates.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $businessStudyStates = $this->businessStudyStatesRepository->find($id);

        if (empty($businessStudyStates)) {
            Flash::error('Business Study States not found');

            return redirect(route('businessStudyStates.index'));
        }

        return view('business_study_states.edit')->with('businessStudyStates', $businessStudyStates);
    }

    /**
     * Update the specified BusinessStudyStates in storage.
     *
     * @param  int              $id
     * @param UpdateBusinessStudyStatesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessStudyStatesRequest $request)
    {
        $businessStudyStates = $this->businessStudyStatesRepository->find($id);

        if (empty($businessStudyStates)) {
            Flash::error('Business Study States not found');

            return redirect(route('businessStudyStates.index'));
        }

        $businessStudyStates = $this->businessStudyStatesRepository->update($request->all(), $id);

        Flash::success('Business Study States updated successfully.');

        return redirect(route('businessStudyStates.index'));
    }

    /**
     * Remove the specified BusinessStudyStates from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $businessStudyStates = $this->businessStudyStatesRepository->find($id);

        if (empty($businessStudyStates)) {
            Flash::error('Business Study States not found');

            return redirect(route('businessStudyStates.index'));
        }

        $this->businessStudyStatesRepository->delete($id);

        Flash::success('Business Study States deleted successfully.');

        return redirect(route('businessStudyStates.index'));
    }
}
