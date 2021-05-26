<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarClassRequest;
use App\Http\Requests\UpdateCarClassRequest;
use App\Repositories\CarClassRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CarClassController extends AppBaseController
{
    /** @var  CarClassRepository */
    private $carClassRepository;

    public function __construct(CarClassRepository $carClassRepo)
    {
        $this->carClassRepository = $carClassRepo;
    }

    /**
     * Display a listing of the CarClass.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carClasses = $this->carClassRepository->all();

        return view('car_classes.index')
            ->with('carClasses', $carClasses);
    }

    /**
     * Show the form for creating a new CarClass.
     *
     * @return Response
     */
    public function create()
    {
        return view('car_classes.create');
    }

    /**
     * Store a newly created CarClass in storage.
     *
     * @param CreateCarClassRequest $request
     *
     * @return Response
     */
    public function store(CreateCarClassRequest $request)
    {
        $input = $request->all();

        $carClass = $this->carClassRepository->create($input);

        Flash::success('Car Class saved successfully.');

        return redirect(route('carClasses.index'));
    }

    /**
     * Display the specified CarClass.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carClass = $this->carClassRepository->find($id);

        if (empty($carClass)) {
            Flash::error('Car Class not found');

            return redirect(route('carClasses.index'));
        }

        return view('car_classes.show')->with('carClass', $carClass);
    }

    /**
     * Show the form for editing the specified CarClass.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carClass = $this->carClassRepository->find($id);

        if (empty($carClass)) {
            Flash::error('Car Class not found');

            return redirect(route('carClasses.index'));
        }

        return view('car_classes.edit')->with('carClass', $carClass);
    }

    /**
     * Update the specified CarClass in storage.
     *
     * @param int $id
     * @param UpdateCarClassRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarClassRequest $request)
    {
        $carClass = $this->carClassRepository->find($id);

        if (empty($carClass)) {
            Flash::error('Car Class not found');

            return redirect(route('carClasses.index'));
        }

        $carClass = $this->carClassRepository->update($request->all(), $id);

        Flash::success('Car Class updated successfully.');

        return redirect(route('carClasses.index'));
    }

    /**
     * Remove the specified CarClass from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carClass = $this->carClassRepository->find($id);

        if (empty($carClass)) {
            Flash::error('Car Class not found');

            return redirect(route('carClasses.index'));
        }

        $this->carClassRepository->delete($id);

        Flash::success('Car Class deleted successfully.');

        return redirect(route('carClasses.index'));
    }
}
