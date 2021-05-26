<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarStateRequest;
use App\Http\Requests\UpdateCarStateRequest;
use App\Repositories\CarStateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CarStateController extends AppBaseController
{
    /** @var  CarStateRepository */
    private $carStateRepository;

    public function __construct(CarStateRepository $carStateRepo)
    {
        $this->carStateRepository = $carStateRepo;
    }

    /**
     * Display a listing of the CarState.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carStates = $this->carStateRepository->all();

        return view('car_states.index')
            ->with('carStates', $carStates);
    }

    /**
     * Show the form for creating a new CarState.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_states.create');
    }

    /**
     * Store a newly created CarState in storage.
     *
     * @param CreateCarStateRequest $request
     *
     * @return Response
     */
    public function store(CreateCarStateRequest $request)
    {
        $input = $request->all();

        $carState = $this->carStateRepository->create($input);

        Flash::success('Car State saved successfully.');

        return redirect(route('carStates.index'));
    }

    /**
     * Display the specified CarState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carState = $this->carStateRepository->find($id);

        if (empty($carState)) {
            Flash::error('Car State not found');

            return redirect(route('carStates.index'));
        }

        return view('car_states.show')->with('carState', $carState);
    }

    /**
     * Show the form for editing the specified CarState.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carState = $this->carStateRepository->find($id);

        if (empty($carState)) {
            Flash::error('Car State not found');

            return redirect(route('carStates.index'));
        }

        return view('car_states.edit')->with('carState', $carState);
    }

    /**
     * Update the specified CarState in storage.
     *
     * @param int $id
     * @param UpdateCarStateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarStateRequest $request)
    {
        $carState = $this->carStateRepository->find($id);

        if (empty($carState)) {
            Flash::error('Car State not found');

            return redirect(route('carStates.index'));
        }

        $carState = $this->carStateRepository->update($request->all(), $id);

        Flash::success('Car State updated successfully.');

        return redirect(route('carStates.index'));
    }

    /**
     * Remove the specified CarState from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carState = $this->carStateRepository->find($id);

        if (empty($carState)) {
            Flash::error('Car State not found');

            return redirect(route('carStates.index'));
        }

        $this->carStateRepository->delete($id);

        Flash::success('Car State deleted successfully.');

        return redirect(route('carStates.index'));
    }
}
