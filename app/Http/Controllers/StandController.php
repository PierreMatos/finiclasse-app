<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStandRequest;
use App\Http\Requests\UpdateStandRequest;
use App\Repositories\StandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StandController extends AppBaseController
{
    /** @var  StandRepository */
    private $standRepository;

    public function __construct(StandRepository $standRepo)
    {
        $this->standRepository = $standRepo;
    }

    /**
     * Display a listing of the Stand.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stands = $this->standRepository->all();

        return view('stands.index')
            ->with('stands', $stands);
    }

    /**
     * Show the form for creating a new Stand.
     *
     * @return Response
     */
    public function create()
    {
        return view('stands.create');
    }

    /**
     * Store a newly created Stand in storage.
     *
     * @param CreateStandRequest $request
     *
     * @return Response
     */
    public function store(CreateStandRequest $request)
    {
        $input = $request->all();

        $stand = $this->standRepository->create($input);

        Flash::success('Stand saved successfully.');

        return redirect(route('stands.index'));
    }

    /**
     * Display the specified Stand.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stand = $this->standRepository->find($id);

        if (empty($stand)) {
            Flash::error('Stand not found');

            return redirect(route('stands.index'));
        }

        return view('stands.show')->with('stand', $stand);
    }

    /**
     * Show the form for editing the specified Stand.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stand = $this->standRepository->find($id);

        if (empty($stand)) {
            Flash::error('Stand not found');

            return redirect(route('stands.index'));
        }

        return view('stands.edit')->with('stand', $stand);
    }

    /**
     * Update the specified Stand in storage.
     *
     * @param int $id
     * @param UpdateStandRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStandRequest $request)
    {
        $stand = $this->standRepository->find($id);

        if (empty($stand)) {
            Flash::error('Stand not found');

            return redirect(route('stands.index'));
        }

        $stand = $this->standRepository->update($request->all(), $id);

        Flash::success('Stand updated successfully.');

        return redirect(route('stands.index'));
    }

    /**
     * Remove the specified Stand from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stand = $this->standRepository->find($id);

        if (empty($stand)) {
            Flash::error('Stand not found');

            return redirect(route('stands.index'));
        }

        $this->standRepository->delete($id);

        Flash::success('Stand deleted successfully.');

        return redirect(route('stands.index'));
    }
}
