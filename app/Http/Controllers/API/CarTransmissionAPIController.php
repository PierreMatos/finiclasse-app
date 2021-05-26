<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarTransmissionAPIRequest;
use App\Http\Requests\API\UpdateCarTransmissionAPIRequest;
use App\Models\CarTransmission;
use App\Repositories\CarTransmissionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarTransmissionResource;
use Response;

/**
 * Class CarTransmissionController
 * @package App\Http\Controllers\API
 */

class CarTransmissionAPIController extends AppBaseController
{
    /** @var  CarTransmissionRepository */
    private $carTransmissionRepository;

    public function __construct(CarTransmissionRepository $carTransmissionRepo)
    {
        $this->carTransmissionRepository = $carTransmissionRepo;
    }

    /**
     * Display a listing of the CarTransmission.
     * GET|HEAD /carTransmissions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carTransmissions = $this->carTransmissionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CarTransmissionResource::collection($carTransmissions), 'Car Transmissions retrieved successfully');
    }

    /**
     * Store a newly created CarTransmission in storage.
     * POST /carTransmissions
     *
     * @param CreateCarTransmissionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarTransmissionAPIRequest $request)
    {
        $input = $request->all();

        $carTransmission = $this->carTransmissionRepository->create($input);

        return $this->sendResponse(new CarTransmissionResource($carTransmission), 'Car Transmission saved successfully');
    }

    /**
     * Display the specified CarTransmission.
     * GET|HEAD /carTransmissions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarTransmission $carTransmission */
        $carTransmission = $this->carTransmissionRepository->find($id);

        if (empty($carTransmission)) {
            return $this->sendError('Car Transmission not found');
        }

        return $this->sendResponse(new CarTransmissionResource($carTransmission), 'Car Transmission retrieved successfully');
    }

    /**
     * Update the specified CarTransmission in storage.
     * PUT/PATCH /carTransmissions/{id}
     *
     * @param int $id
     * @param UpdateCarTransmissionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarTransmissionAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarTransmission $carTransmission */
        $carTransmission = $this->carTransmissionRepository->find($id);

        if (empty($carTransmission)) {
            return $this->sendError('Car Transmission not found');
        }

        $carTransmission = $this->carTransmissionRepository->update($input, $id);

        return $this->sendResponse(new CarTransmissionResource($carTransmission), 'CarTransmission updated successfully');
    }

    /**
     * Remove the specified CarTransmission from storage.
     * DELETE /carTransmissions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarTransmission $carTransmission */
        $carTransmission = $this->carTransmissionRepository->find($id);

        if (empty($carTransmission)) {
            return $this->sendError('Car Transmission not found');
        }

        $carTransmission->delete();

        return $this->sendSuccess('Car Transmission deleted successfully');
    }
}
