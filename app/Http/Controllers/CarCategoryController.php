<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarCategoryRequest;
use App\Http\Requests\UpdateCarCategoryRequest;
use App\Repositories\CarCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CarCategoryController extends AppBaseController
{
    /** @var  CarCategoryRepository */
    private $carCategoryRepository;

    public function __construct(CarCategoryRepository $carCategoryRepo)
    {
        $this->carCategoryRepository = $carCategoryRepo;
    }

    /**
     * Display a listing of the CarCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carCategories = $this->carCategoryRepository->all();

        return view('car_categories.index')
            ->with('carCategories', $carCategories);
    }

    /**
     * Show the form for creating a new CarCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_categories.create');
    }

    /**
     * Store a newly created CarCategory in storage.
     *
     * @param CreateCarCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCarCategoryRequest $request)
    {
        $input = $request->all();

        $carCategory = $this->carCategoryRepository->create($input);

        Flash::success('Car Category saved successfully.');

        return redirect(route('carCategories.index'));
    }

    /**
     * Display the specified CarCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carCategory = $this->carCategoryRepository->find($id);

        if (empty($carCategory)) {
            Flash::error('Car Category not found');

            return redirect(route('carCategories.index'));
        }

        return view('car_categories.show')->with('carCategory', $carCategory);
    }

    /**
     * Show the form for editing the specified CarCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carCategory = $this->carCategoryRepository->find($id);

        if (empty($carCategory)) {
            Flash::error('Car Category not found');

            return redirect(route('carCategories.index'));
        }

        return view('car_categories.edit')->with('carCategory', $carCategory);
    }

    /**
     * Update the specified CarCategory in storage.
     *
     * @param int $id
     * @param UpdateCarCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarCategoryRequest $request)
    {
        $carCategory = $this->carCategoryRepository->find($id);

        if (empty($carCategory)) {
            Flash::error('Car Category not found');

            return redirect(route('carCategories.index'));
        }

        $carCategory = $this->carCategoryRepository->update($request->all(), $id);

        Flash::success('Car Category updated successfully.');

        return redirect(route('carCategories.index'));
    }

    /**
     * Remove the specified CarCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carCategory = $this->carCategoryRepository->find($id);

        if (empty($carCategory)) {
            Flash::error('Car Category not found');

            return redirect(route('carCategories.index'));
        }

        $this->carCategoryRepository->delete($id);

        Flash::success('Car Category deleted successfully.');

        return redirect(route('carCategories.index'));
    }
}
