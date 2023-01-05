<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfitMarginRequest;
use App\Http\Requests\UpdateProfitMarginRequest;
use App\Repositories\ProfitMarginRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Repositories\MakeRepository;
use App\Repositories\CarFuelRepository;
use App\Repositories\CarCategoryRepository;
use App\Repositories\CarModelRepository;
use Flash;
use Response;

class ProfitMarginController extends AppBaseController
{
    /** @var  ProfitMarginRepository */
    private $profitMarginRepository;
    private $MakeRepository;
    private $CarFuelRepository;
    private $CarCategoryRepository;


    public function __construct(ProfitMarginRepository $profitMarginRepo, MakeRepository $makeRepo, CarFuelRepository $carFuelRepo, CarCategoryRepository $carCategoryRepo)
    {
        $this->profitMarginRepository = $profitMarginRepo;
        $this->makeRepository = $makeRepo;
        $this->carCategoryRepository = $carCategoryRepo;
        $this->carFuelRepository = $carFuelRepo;
        
    }

    /**
     * Display a listing of the ProfitMargin.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $profitMargins = $this->profitMarginRepository->paginate(10);

        return view('profit_margins.index')
            ->with('profitMargins', $profitMargins);
    }

    /**
     * Show the form for creating a new ProfitMargin.
     *
     * @return Response
     */
    public function create()
    {

        // $models = $this->modelRepository->all();
        $makes = $this->makeRepository->all();
        $categories = $this->carCategoryRepository->all();
        // $conditions = $this->carConditionRepository->all();
        // $states = $this->carStateRepository->all();
        // $stands = $this->standRepository->all();
        // $transmissions = $this->carTransmissionRepository->all();
        // $drives = $this->carDriveRepository->all();
        $fuels = $this->carFuelRepository->all();
        // $classes = $this->carClassRepository->all();
        
        $carData = ([
            // 'models' => $models,
            'makes' => $makes,
            'categories' => $categories,
            // 'conditions' => $conditions,
            // 'states' => $states,
            // 'stands' => $stands,
            // 'transmissions' => $transmissions,
            // 'drives' => $drives,
            'fuels' => $fuels,
            // 'classes' => $classes
        ]);

        return view('profit_margins.create')
            ->with('carData', $carData);
        ;
    }

    /**
     * Store a newly created ProfitMargin in storage.
     *
     * @param CreateProfitMarginRequest $request
     *
     * @return Response
     */
    public function store(CreateProfitMarginRequest $request)
    {
        $input = $request->all();

        $profitMargin = $this->profitMarginRepository->create($input);

        Flash::success('Profit Margin saved successfully.');

        return redirect(route('profitMargins.index'));
    }

    /**
     * Display the specified ProfitMargin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profitMargin = $this->profitMarginRepository->find($id);

        if (empty($profitMargin)) {
            Flash::error('Profit Margin not found');

            return redirect(route('profitMargins.index'));
        }

        return view('profit_margins.show')->with('profitMargin', $profitMargin);
    }

    /**
     * Show the form for editing the specified ProfitMargin.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profitMargin = $this->profitMarginRepository->find($id);

        $models = $this->modelRepository->all();
        $makes = $this->makeRepository->all();
        $categories = $this->carCategoryRepository->all();
        $fuels = $this->carFuelRepository->all();

        $carData = ([
            'models' => $models,
            'makes' => $makes,
            'categories' => $categories,
            'fuels' => $fuels,
        ]);

        if (empty($profitMargin)) {
            Flash::error('Profit Margin not found');

            return redirect(route('profitMargins.index'));
        }

        return view('profit_margins.edit')
            ->with('profitMargin', $profitMargin)
            ->with('carData', $carData);
    }

    /**
     * Update the specified ProfitMargin in storage.
     *
     * @param int $id
     * @param UpdateProfitMarginRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfitMarginRequest $request)
    {
        $profitMargin = $this->profitMarginRepository->find($id);

        if (empty($profitMargin)) {
            Flash::error('Profit Margin not found');

            return redirect(route('profitMargins.index'));
        }

        $profitMargin = $this->profitMarginRepository->update($request->all(), $id);

        Flash::success('Profit Margin updated successfully.');

        return redirect(route('profitMargins.index'));
    }

    /**
     * Remove the specified ProfitMargin from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profitMargin = $this->profitMarginRepository->find($id);

        if (empty($profitMargin)) {
            Flash::error('Profit Margin not found');

            return redirect(route('profitMargins.index'));
        }

        $this->profitMarginRepository->delete($id);

        Flash::success('Profit Margin deleted successfully.');

        return redirect(route('profitMargins.index'));
    }
}
