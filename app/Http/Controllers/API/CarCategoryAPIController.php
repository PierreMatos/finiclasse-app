<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCarCategoryAPIRequest;
use App\Http\Requests\API\UpdateCarCategoryAPIRequest;
use App\Models\CarCategory;
use App\Repositories\CarCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CarCategoryResource;
use Response;

/**
 * Class CarCategoryController
 * @package App\Http\Controllers\API
 */

class CarCategoryAPIController extends AppBaseController
{
    /** @var  CarCategoryRepository */
    private $carCategoryRepository;

    public function __construct(CarCategoryRepository $carCategoryRepo)
    {
        $this->carCategoryRepository = $carCategoryRepo;
    }

    /**
     * Display a listing of the CarCategory.
     * GET|HEAD /carCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $carCategories = $this->carCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CarCategoryResource::collection($carCategories), 'Car Categories retrieved successfully');
    }

    /**
     * Store a newly created CarCategory in storage.
     * POST /carCategories
     *
     * @param CreateCarCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCarCategoryAPIRequest $request)
    {
        $input = $request->all();

        $carCategory = $this->carCategoryRepository->create($input);

        return $this->sendResponse(new CarCategoryResource($carCategory), 'Car Category saved successfully');
    }

    /**
     * Display the specified CarCategory.
     * GET|HEAD /carCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CarCategory $carCategory */
        $carCategory = $this->carCategoryRepository->find($id);

        if (empty($carCategory)) {
            return $this->sendError('Car Category not found');
        }

        return $this->sendResponse(new CarCategoryResource($carCategory), 'Car Category retrieved successfully');
    }

    /**
     * Update the specified CarCategory in storage.
     * PUT/PATCH /carCategories/{id}
     *
     * @param int $id
     * @param UpdateCarCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var CarCategory $carCategory */
        $carCategory = $this->carCategoryRepository->find($id);

        if (empty($carCategory)) {
            return $this->sendError('Car Category not found');
        }

        $carCategory = $this->carCategoryRepository->update($input, $id);

        return $this->sendResponse(new CarCategoryResource($carCategory), 'CarCategory updated successfully');
    }

    /**
     * Remove the specified CarCategory from storage.
     * DELETE /carCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CarCategory $carCategory */
        $carCategory = $this->carCategoryRepository->find($id);

        if (empty($carCategory)) {
            return $this->sendError('Car Category not found');
        }

        $carCategory->delete();

        return $this->sendSuccess('Car Category deleted successfully');
    }
}
