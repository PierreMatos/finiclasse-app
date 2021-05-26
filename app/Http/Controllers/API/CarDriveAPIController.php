<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarDriveAPIRequest;
use App\Http\Requests\API\UpdateCarDriveAPIRequest;
use App\Models\CarDrive;
use App\Repositories\CarDriveRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarDriveResource;
use Response;

/**
 * Class CarDriveController
 * @package App\Http\Controllers\API
 */

class CarDriveAPIController extends AppBaseController
{
    /** @var  CarDriveRepository */
    private $carDriveRepository;

    public function __construct(CarDriveRepository $carDriveRepo)
    {
        $this->carDriveRepository = $carDriveRepo;
    }

    /**
     * Display a listing of the CarDrive.
     * GET|HEAD /carDrives
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carDrives = $this->carDriveRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CarDriveResource::collection($carDrives), 'Car Drives retrieved successfully');
    }

    /**
     * Store a newly created CarDrive in storage.
     * POST /carDrives
     *
     * @param CreateCarDriveAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarDriveAPIRequest $request)
    {
        $input = $request->all();

        $carDrive = $this->carDriveRepository->create($input);

        return $this->sendResponse(new CarDriveResource($carDrive), 'Car Drive saved successfully');
    }

    /**
     * Display the specified CarDrive.
     * GET|HEAD /carDrives/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarDrive $carDrive */
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            return $this->sendError('Car Drive not found');
        }

        return $this->sendResponse(new CarDriveResource($carDrive), 'Car Drive retrieved successfully');
    }

    /**
     * Update the specified CarDrive in storage.
     * PUT/PATCH /carDrives/{id}
     *
     * @param int $id
     * @param UpdateCarDriveAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarDriveAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarDrive $carDrive */
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            return $this->sendError('Car Drive not found');
        }

        $carDrive = $this->carDriveRepository->update($input, $id);

        return $this->sendResponse(new CarDriveResource($carDrive), 'CarDrive updated successfully');
    }

    /**
     * Remove the specified CarDrive from storage.
     * DELETE /carDrives/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarDrive $carDrive */
        $carDrive = $this->carDriveRepository->find($id);

        if (empty($carDrive)) {
            return $this->sendError('Car Drive not found');
        }

        $carDrive->delete();

        return $this->sendSuccess('Car Drive deleted successfully');
    }
}
