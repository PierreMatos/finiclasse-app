<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBenefitsBusinessStudyRequest;
use App\Http\Requests\UpdateBenefitsBusinessStudyRequest;
use App\Repositories\BenefitsBusinessStudyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BenefitsBusinessStudyController extends AppBaseController
{
    /** @var  BenefitsBusinessStudyRepository */
    private $benefitsBusinessStudyRepository;

    public function __construct(BenefitsBusinessStudyRepository $benefitsBusinessStudyRepo)
    {
        $this->benefitsBusinessStudyRepository = $benefitsBusinessStudyRepo;
    }

    /**
     * Display a listing of the BenefitsBusinessStudy.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $benefitsBusinessStudies = $this->benefitsBusinessStudyRepository->all();

        return view('benefits_business_studies.index')
            ->with('benefitsBusinessStudies', $benefitsBusinessStudies);
    }

    /**
     * Show the form for creating a new BenefitsBusinessStudy.
     *
     * @return Response
     */
    public function create()
    {
        return view('benefits_business_studies.create');
    }

    /**
     * Store a newly created BenefitsBusinessStudy in storage.
     *
     * @param CreateBenefitsBusinessStudyRequest $request
     *
     * @return Response
     */
    public function store(CreateBenefitsBusinessStudyRequest $request)
    {
        $input = $request->all();

        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->create($input);

        Flash::success('Benefits Business Study saved successfully.');

        return redirect(route('benefitBusinessStudies.index'));
    }

    /**
     * Display the specified BenefitsBusinessStudy.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->find($id);

        if (empty($benefitsBusinessStudy)) {
            Flash::error('Benefits Business Study not found');

            return redirect(route('benefitBusinessStudies.index'));
        }

        return view('benefits_business_studies.show')->with('benefitsBusinessStudy', $benefitsBusinessStudy);
    }

    /**
     * Show the form for editing the specified BenefitsBusinessStudy.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->find($id);

        if (empty($benefitsBusinessStudy)) {
            Flash::error('Benefits Business Study not found');

            return redirect(route('benefitBusinessStudies.index'));
        }

        return view('benefits_business_studies.edit')->with('benefitsBusinessStudy', $benefitsBusinessStudy);
    }

    /**
     * Update the specified BenefitsBusinessStudy in storage.
     *
     * @param int $id
     * @param UpdateBenefitsBusinessStudyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBenefitsBusinessStudyRequest $request)
    {
        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->find($id);

        if (empty($benefitsBusinessStudy)) {
            Flash::error('Benefits Business Study not found');

            return redirect(route('benefitBusinessStudies.index'));
        }

        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->update($request->all(), $id);

        Flash::success('Benefits Business Study updated successfully.');

        return redirect(route('benefitBusinessStudies.index'));
    }

    /**
     * Remove the specified BenefitsBusinessStudy from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $benefitsBusinessStudy = $this->benefitsBusinessStudyRepository->find($id);

        if (empty($benefitsBusinessStudy)) {
            Flash::error('Benefits Business Study not found');

            return redirect(route('benefitBusinessStudies.index'));
        }

        $this->benefitsBusinessStudyRepository->delete($id);

        Flash::success('Benefits Business Study deleted successfully.');

        return redirect(route('benefitBusinessStudies.index'));
    }
}
