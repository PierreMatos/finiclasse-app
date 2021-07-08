<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBenefitsProposalsRequest;
use App\Http\Requests\UpdateBenefitsProposalsRequest;
use App\Repositories\BenefitsProposalsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BenefitsProposalsController extends AppBaseController
{
    /** @var  BenefitsProposalsRepository */
    private $benefitsProposalsRepository;

    public function __construct(BenefitsProposalsRepository $benefitsProposalsRepo)
    {
        $this->benefitsProposalsRepository = $benefitsProposalsRepo;
    }

    /**
     * Display a listing of the BenefitsProposals.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $benefitsProposals = $this->benefitsProposalsRepository->all();

        return view('benefits_proposals.index')
            ->with('benefitsProposals', $benefitsProposals);
    }

    /**
     * Show the form for creating a new BenefitsProposals.
     *
     * @return Response
     */
    public function create()
    {
        return view('benefits_proposals.create');
    }

    /**
     * Store a newly created BenefitsProposals in storage.
     *
     * @param CreateBenefitsProposalsRequest $request
     *
     * @return Response
     */
    public function store(CreateBenefitsProposalsRequest $request)
    {
        $input = $request->all();

        $benefitsProposals = $this->benefitsProposalsRepository->create($input);

        Flash::success('Benefits Proposals saved successfully.');

        return redirect(route('benefitsProposals.index'));
    }

    /**
     * Display the specified BenefitsProposals.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $benefitsProposals = $this->benefitsProposalsRepository->find($id);

        if (empty($benefitsProposals)) {
            Flash::error('Benefits Proposals not found');

            return redirect(route('benefitsProposals.index'));
        }

        return view('benefits_proposals.show')->with('benefitsProposals', $benefitsProposals);
    }

    /**
     * Show the form for editing the specified BenefitsProposals.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $benefitsProposals = $this->benefitsProposalsRepository->find($id);

        if (empty($benefitsProposals)) {
            Flash::error('Benefits Proposals not found');

            return redirect(route('benefitsProposals.index'));
        }

        return view('benefits_proposals.edit')->with('benefitsProposals', $benefitsProposals);
    }

    /**
     * Update the specified BenefitsProposals in storage.
     *
     * @param int $id
     * @param UpdateBenefitsProposalsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBenefitsProposalsRequest $request)
    {
        $benefitsProposals = $this->benefitsProposalsRepository->find($id);

        if (empty($benefitsProposals)) {
            Flash::error('Benefits Proposals not found');

            return redirect(route('benefitsProposals.index'));
        }

        $benefitsProposals = $this->benefitsProposalsRepository->update($request->all(), $id);

        Flash::success('Benefits Proposals updated successfully.');

        return redirect(route('benefitsProposals.index'));
    }

    /**
     * Remove the specified BenefitsProposals from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $benefitsProposals = $this->benefitsProposalsRepository->find($id);

        if (empty($benefitsProposals)) {
            Flash::error('Benefits Proposals not found');

            return redirect(route('benefitsProposals.index'));
        }

        $this->benefitsProposalsRepository->delete($id);

        Flash::success('Benefits Proposals deleted successfully.');

        return redirect(route('benefitsProposals.index'));
    }
}
