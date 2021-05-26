<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarClassAPIRequest;
use App\Http\Requests\API\UpdateCarClassAPIRequest;
use App\Models\CarClass;
use App\Repositories\CarClassRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarClassResource;
use Response;

/**
 * Class CarClassController
 * @package App\Http\Controllers\API
 */

class CarClassAPIController extends AppBaseController
{
    /** @var  CarClassRepository */
    private $carClassRepository;

    public function __construct(CarClassRepository $carClassRepo)
    {
        $this->carClassRepository = $carClassRepo;
    }

    /**
     * Display a listing of the CarClass.
     * GET|HEAD /carClasses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carClasses = $this->carClassRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CarClassResource::collection($carClasses), 'Car Classes retrieved successfully');
    }

    /**
     * Store a newly created CarClass in storage.
     * POST /carClasses
     *
     * @param CreateCarClassAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarClassAPIRequest $request)
    {
        $input = $request->all();

        $carClass = $this->carClassRepository->create($input);

        return $this->sendResponse(new CarClassResource($carClass), 'Car Class saved successfully');
    }

    /**
     * Display the specified CarClass.
     * GET|HEAD /carClasses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarClass $carClass */
        $carClass = $this->carClassRepository->find($id);

        if (empty($carClass)) {
            return $this->sendError('Car Class not found');
        }

        return $this->sendResponse(new CarClassResource($carClass), 'Car Class retrieved successfully');
    }

    /**
     * Update the specified CarClass in storage.
     * PUT/PATCH /carClasses/{id}
     *
     * @param int $id
     * @param UpdateCarClassAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarClassAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarClass $carClass */
        $carClass = $this->carClassRepository->find($id);

        if (empty($carClass)) {
            return $this->sendError('Car Class not found');
        }

        $carClass = $this->carClassRepository->update($input, $id);

        return $this->sendResponse(new CarClassResource($carClass), 'CarClass updated successfully');
    }

    /**
     * Remove the specified CarClass from storage.
     * DELETE /carClasses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarClass $carClass */
        $carClass = $this->carClassRepository->find($id);

        if (empty($carClass)) {
            return $this->sendError('Car Class not found');
        }

        $carClass->delete();

        return $this->sendSuccess('Car Class deleted successfully');
    }
}
