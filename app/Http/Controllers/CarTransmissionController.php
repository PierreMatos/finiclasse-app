<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarTransmissionRequest;
use App\Http\Requests\UpdateCarTransmissionRequest;
use App\Repositories\CarTransmissionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CarTransmissionController extends AppBaseController
{
    /** @var  CarTransmissionRepository */
    private $carTransmissionRepository;

    public function __construct(CarTransmissionRepository $carTransmissionRepo)
    {
        $this->carTransmissionRepository = $carTransmissionRepo;
    }

    /**
     * Display a listing of the CarTransmission.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carTransmissions = $this->carTransmissionRepository->all();

        return view('car_transmissions.index')
            ->with('carTransmissions', $carTransmissions);
    }

    /**
     * Show the form for creating a new CarTransmission.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_transmissions.create');
    }

    /**
     * Store a newly created CarTransmission in storage.
     *
     * @param CreateCarTransmissionRequest $request
     *
     * @return Response
     */
    public function store(CreateCarTransmissionRequest $request)
    {
        $input = $request->all();

        $carTransmission = $this->carTransmissionRepository->create($input);

        Flash::success('Car Transmission saved successfully.');

        return redirect(route('carTransmissions.index'));
    }

    /**
     * Display the specified CarTransmission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carTransmission = $this->carTransmissionRepository->find($id);

        if (empty($carTransmission)) {
            Flash::error('Car Transmission not found');

            return redirect(route('carTransmissions.index'));
        }

        return view('car_transmissions.show')->with('carTransmission', $carTransmission);
    }

    /**
     * Show the form for editing the specified CarTransmission.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carTransmission = $this->carTransmissionRepository->find($id);

        if (empty($carTransmission)) {
            Flash::error('Car Transmission not found');

            return redirect(route('carTransmissions.index'));
        }

        return view('car_transmissions.edit')->with('carTransmission', $carTransmission);
    }

    /**
     * Update the specified CarTransmission in storage.
     *
     * @param int $id
     * @param UpdateCarTransmissionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarTransmissionRequest $request)
    {
        $carTransmission = $this->carTransmissionRepository->find($id);

        if (empty($carTransmission)) {
            Flash::error('Car Transmission not found');

            return redirect(route('carTransmissions.index'));
        }

        $carTransmission = $this->carTransmissionRepository->update($request->all(), $id);

        Flash::success('Car Transmission updated successfully.');

        return redirect(route('carTransmissions.index'));
    }

    /**
     * Remove the specified CarTransmission from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carTransmission = $this->carTransmissionRepository->find($id);

        if (empty($carTransmission)) {
            Flash::error('Car Transmission not found');

            return redirect(route('carTransmissions.index'));
        }

        $this->carTransmissionRepository->delete($id);

        Flash::success('Car Transmission deleted successfully.');

        return redirect(route('carTransmissions.index'));
    }
}
