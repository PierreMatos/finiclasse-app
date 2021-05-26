<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMakeRequest;
use App\Http\Requests\UpdateMakeRequest;
use App\Repositories\MakeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MakeController extends AppBaseController
{
    /** @var  MakeRepository */
    private $makeRepository;

    public function __construct(MakeRepository $makeRepo)
    {
        $this->makeRepository = $makeRepo;
    }

    /**
     * Display a listing of the Make.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $makes = $this->makeRepository->all();

        return view('makes.index')
            ->with('makes', $makes);
    }

    /**
     * Show the form for creating a new Make.
     *
     * @return Response
     */
    public function create()
    {
        return view('makes.create');
    }

    /**
     * Store a newly created Make in storage.
     *
     * @param CreateMakeRequest $request
     *
     * @return Response
     */
    public function store(CreateMakeRequest $request)
    {
        $input = $request->all();

        $make = $this->makeRepository->create($input);

        Flash::success('Make saved successfully.');

        return redirect(route('makes.index'));
    }

    /**
     * Display the specified Make.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $make = $this->makeRepository->find($id);

        if (empty($make)) {
            Flash::error('Make not found');

            return redirect(route('makes.index'));
        }

        return view('makes.show')->with('make', $make);
    }

    /**
     * Show the form for editing the specified Make.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $make = $this->makeRepository->find($id);

        if (empty($make)) {
            Flash::error('Make not found');

            return redirect(route('makes.index'));
        }

        return view('makes.edit')->with('make', $make);
    }

    /**
     * Update the specified Make in storage.
     *
     * @param int $id
     * @param UpdateMakeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMakeRequest $request)
    {
        $make = $this->makeRepository->find($id);

        if (empty($make)) {
            Flash::error('Make not found');

            return redirect(route('makes.index'));
        }

        $make = $this->makeRepository->update($request->all(), $id);

        Flash::success('Make updated successfully.');

        return redirect(route('makes.index'));
    }

    /**
     * Remove the specified Make from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $make = $this->makeRepository->find($id);

        if (empty($make)) {
            Flash::error('Make not found');

            return redirect(route('makes.index'));
        }

        $this->makeRepository->delete($id);

        Flash::success('Make deleted successfully.');

        return redirect(route('makes.index'));
    }
}
