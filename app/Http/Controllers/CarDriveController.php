<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarDriveRequest;
use App\Http\Requests\UpdateCarDriveRequest;
use App\Repositories\CarDriveRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CarDriveController extends AppBaseController
{
    /** @var  CarDriveRepository */
    private $carDriveRepository;

    public function __construct(CarDriveRepository $carDriveRepo)
    {
        $this->carDriveRepository = $carDriveRepo;
    }

    /**
     * Display a listing of the CarDrive.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carDrives = $this->carDriveRepository->all();

        return view('car_drives.index')
            ->with('carDrives', $carDrives);
    }

    /**
     * Show the form for creating a new CarDrive.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_drives.create');
    }

    /**
     * Store a newly created CarDrive in storage.
     *
     * @param CreateCarDriveRequest $request
     *
     * @return Response
     */
    public function store(CreateCarDriveRequest $request)
    {
        $input = $request->all();

        $carDrive = $this->carDriveRepository->create($input);

        Flash::success('Car Drive saved successfully.');

        return redirect(route('carDrives.index'));
    }

    /**
     * Display the specified CarDrive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            Flash::error('Car Drive not found');

            return redirect(route('carDrives.index'));
        }

        return view('car_drives.show')->with('carDrive', $carDrive);
    }

    /**
     * Show the form for editing the specified CarDrive.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            Flash::error('Car Drive not found');

            return redirect(route('carDrives.index'));
        }

        return view('car_drives.edit')->with('carDrive', $carDrive);
    }

    /**
     * Update the specified CarDrive in storage.
     *
     * @param int $id
     * @param UpdateCarDriveRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarDriveRequest $request)
    {
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            Flash::error('Car Drive not found');

            return redirect(route('carDrives.index'));
        }

        $carDrive = $this->carDriveRepository->update($request->all(), $id);

        Flash::success('Car Drive updated successfully.');

        return redirect(route('carDrives.index'));
    }

    /**
     * Remove the specified CarDrive from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            Flash::error('Car Drive not found');

            return redirect(route('carDrives.index'));
        }

        $this->carDriveRepository->delete($id);

        Flash::success('Car Drive deleted successfully.');

        return redirect(route('carDrives.index'));
    }
}
