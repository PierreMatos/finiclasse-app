<?php

namespace App\Http\Controllers;

use App\DataTables\TradeinStateDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTradeinStateRequest;
use App\Http\Requests\UpdateTradeinStateRequest;
use App\Repositories\TradeinStateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TradeinStateController extends AppBaseController
{
    /** @var  TradeinStateRepository */
    private $tradeinStateRepository;

    public function __construct(TradeinStateRepository $tradeinStateRepo)
    {
        $this->tradeinStateRepository = $tradeinStateRepo;
    }

    /**
     * Display a listing of the TradeinState.
     *
     * @param TradeinStateDataTable $tradeinStateDataTable
     * @return Response
     */
    public function index(TradeinStateDataTable $tradeinStateDataTable)
    {
        return $tradeinStateDataTable->render('tradein_states.index');
    }

    /**
     * Show the form for creating a new TradeinState.
     *
     * @return Response
     */
    public function create()
    {
        return view('tradein_states.create');
    }

    /**
     * Store a newly created TradeinState in storage.
     *
     * @param CreateTradeinStateRequest $request
     *
     * @return Response
     */
    public function store(CreateTradeinStateRequest $request)
    {
        $input = $request->all();

        $tradeinState = $this->tradeinStateRepository->create($input);

        Flash::success('Tradein State saved successfully.');

        return redirect(route('tradeinStates.index'));
    }

    /**
     * Display the specified TradeinState.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tradeinState = $this->tradeinStateRepository->find($id);

        if (empty($tradeinState)) {
            Flash::error('Tradein State not found');

            return redirect(route('tradeinStates.index'));
        }

        return view('tradein_states.show')->with('tradeinState', $tradeinState);
    }

    /**
     * Show the form for editing the specified TradeinState.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tradeinState = $this->tradeinStateRepository->find($id);

        if (empty($tradeinState)) {
            Flash::error('Tradein State not found');

            return redirect(route('tradeinStates.index'));
        }

        return view('tradein_states.edit')->with('tradeinState', $tradeinState);
    }

    /**
     * Update the specified TradeinState in storage.
     *
     * @param  int              $id
     * @param UpdateTradeinStateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTradeinStateRequest $request)
    {
        $tradeinState = $this->tradeinStateRepository->find($id);

        if (empty($tradeinState)) {
            Flash::error('Tradein State not found');

            return redirect(route('tradeinStates.index'));
        }

        $tradeinState = $this->tradeinStateRepository->update($request->all(), $id);

        Flash::success('Tradein State updated successfully.');

        return redirect(route('tradeinStates.index'));
    }

    /**
     * Remove the specified TradeinState from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tradeinState = $this->tradeinStateRepository->find($id);

        if (empty($tradeinState)) {
            Flash::error('Tradein State not found');

            return redirect(route('tradeinStates.index'));
        }

        $this->tradeinStateRepository->delete($id);

        Flash::success('Tradein State deleted successfully.');

        return redirect(route('tradeinStates.index'));
    }
}
