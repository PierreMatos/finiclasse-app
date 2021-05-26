<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarConditionRequest;
use App\Http\Requests\UpdateCarConditionRequest;
use App\Repositories\CarConditionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CarConditionController extends AppBaseController
{
    /** @var  CarConditionRepository */
    private $carConditionRepository;

    public function __construct(CarConditionRepository $carConditionRepo)
    {
        $this->carConditionRepository = $carConditionRepo;
    }

    /**
     * Display a listing of the CarCondition.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carConditions = $this->carConditionRepository->all();

        return view('car_conditions.index')
            ->with('carConditions', $carConditions);
    }

    /**
     * Show the form for creating a new CarCondition.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_conditions.create');
    }

    /**
     * Store a newly created CarCondition in storage.
     *
     * @param CreateCarConditionRequest $request
     *
     * @return Response
     */
    public function store(CreateCarConditionRequest $request)
    {
        $input = $request->all();

        $carCondition = $this->carConditionRepository->create($input);

        Flash::success('Car Condition saved successfully.');

        return redirect(route('carConditions.index'));
    }

    /**
     * Display the specified CarCondition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carCondition = $this->carConditionRepository->find($id);

        if (empty($carCondition)) {
            Flash::error('Car Condition not found');

            return redirect(route('carConditions.index'));
        }

        return view('car_conditions.show')->with('carCondition', $carCondition);
    }

    /**
     * Show the form for editing the specified CarCondition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carCondition = $this->carConditionRepository->find($id);

        if (empty($carCondition)) {
            Flash::error('Car Condition not found');

            return redirect(route('carConditions.index'));
        }

        return view('car_conditions.edit')->with('carCondition', $carCondition);
    }

    /**
     * Update the specified CarCondition in storage.
     *
     * @param int $id
     * @param UpdateCarConditionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarConditionRequest $request)
    {
        $carCondition = $this->carConditionRepository->find($id);

        if (empty($carCondition)) {
            Flash::error('Car Condition not found');

            return redirect(route('carConditions.index'));
        }

        $carCondition = $this->carConditionRepository->update($request->all(), $id);

        Flash::success('Car Condition updated successfully.');

        return redirect(route('carConditions.index'));
    }

    /**
     * Remove the specified CarCondition from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carCondition = $this->carConditionRepository->find($id);

        if (empty($carCondition)) {
            Flash::error('Car Condition not found');

            return redirect(route('carConditions.index'));
        }

        $this->carConditionRepository->delete($id);

        Flash::success('Car Condition deleted successfully.');

        return redirect(route('carConditions.index'));
    }
}
