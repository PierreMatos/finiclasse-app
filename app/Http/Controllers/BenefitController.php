<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBenefitRequest;
use App\Http\Requests\UpdateBenefitRequest;
use App\Repositories\BenefitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BenefitController extends AppBaseController
{
    /** @var  BenefitRepository */
    private $benefitRepository;

    public function __construct(BenefitRepository $benefitRepo)
    {
        $this->benefitRepository = $benefitRepo;
    }

    /**
     * Display a listing of the Benefit.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $benefits = $this->benefitRepository->all();

        return view('benefits.index')
            ->with('benefits', $benefits);
    }

    /**
     * Show the form for creating a new Benefit.
     *
     * @return Response
     */
    public function create()
    {
        return view('benefits.create');
    }

    /**
     * Store a newly created Benefit in storage.
     *
     * @param CreateBenefitRequest $request
     *
     * @return Response
     */
    public function store(CreateBenefitRequest $request)
    {
        $input = $request->all();

        $benefit = $this->benefitRepository->create($input);

        Flash::success('Benefit saved successfully.');

        return redirect(route('benefits.index'));
    }

    /**
     * Display the specified Benefit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            Flash::error('Benefit not found');

            return redirect(route('benefits.index'));
        }

        return view('benefits.show')->with('benefit', $benefit);
    }

    /**
     * Show the form for editing the specified Benefit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            Flash::error('Benefit not found');

            return redirect(route('benefits.index'));
        }

        return view('benefits.edit')->with('benefit', $benefit);
    }

    /**
     * Update the specified Benefit in storage.
     *
     * @param int $id
     * @param UpdateBenefitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBenefitRequest $request)
    {
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            Flash::error('Benefit not found');

            return redirect(route('benefits.index'));
        }

        $benefit = $this->benefitRepository->update($request->all(), $id);

        Flash::success('Benefit updated successfully.');

        return redirect(route('benefits.index'));
    }

    /**
     * Remove the specified Benefit from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $benefit = $this->benefitRepository->find($id);

        if (empty($benefit)) {
            Flash::error('Benefit not found');

            return redirect(route('benefits.index'));
        }

        $this->benefitRepository->delete($id);

        Flash::success('Benefit deleted successfully.');

        return redirect(route('benefits.index'));
    }
}
