<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarModelAPIRequest;
use App\Http\Requests\API\UpdateCarModelAPIRequest;
use App\Models\CarModel;
use App\Repositories\CarModelRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarModelResource;
use Response;

/**
 * Class CarModelController
 * @package App\Http\Controllers\API
 */

class CarModelAPIController extends AppBaseController
{
    /** @var  CarModelRepository */
    private $carModelRepository;

    public function __construct(CarModelRepository $carModelRepo)
    {
        $this->carModelRepository = $carModelRepo;
    }

    /**
     * Display a listing of the CarModel.
     * GET|HEAD /carModels
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $abc = CarModel::find(1);
        // dd($carModels = $this->carModelRepository->getFieldsSearchable());
        $carModels = $this->carModelRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CarModelResource::collection($carModels), 'Car Models retrieved successfully');
    }

    /**
     * Store a newly created CarModel in storage.
     * POST /carModels
     *
     * @param CreateCarModelAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarModelAPIRequest $request)
    {
        $input = $request->all();

        $carModel = $this->carModelRepository->create($input);

        return $this->sendResponse(new CarModelResource($carModel), 'Car Model saved successfully');
    }

    /**
     * Display the specified CarModel.
     * GET|HEAD /carModels/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarModel $carModel */
        $carModel = $this->carModelRepository->find($id);

        if (empty($carModel)) {
            return $this->sendError('Car Model not found');
        }

        return $this->sendResponse(new CarModelResource($carModel), 'Car Model retrieved successfully');
    }

    /**
     * Update the specified CarModel in storage.
     * PUT/PATCH /carModels/{id}
     *
     * @param int $id
     * @param UpdateCarModelAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarModelAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarModel $carModel */
        $carModel = $this->carModelRepository->find($id);

        if (empty($carModel)) {
            return $this->sendError('Car Model not found');
        }

        $carModel = $this->carModelRepository->update($input, $id);

        return $this->sendResponse(new CarModelResource($carModel), 'CarModel updated successfully');
    }

    /**
     * Remove the specified CarModel from storage.
     * DELETE /carModels/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarModel $carModel */
        $carModel = $this->carModelRepository->find($id);

        if (empty($carModel)) {
            return $this->sendError('Car Model not found');
        }

        $carModel->delete();

        return $this->sendSuccess('Car Model deleted successfully');
    }
}
