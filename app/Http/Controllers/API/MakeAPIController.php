<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMakeAPIRequest;
use App\Http\Requests\API\UpdateMakeAPIRequest;
use App\Models\Make;
use App\Repositories\MakeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\MakeResource;
use Response;

/**
 * Class MakeController
 * @package App\Http\Controllers\API
 */

class MakeAPIController extends AppBaseController
{
    /** @var  MakeRepository */
    private $makeRepository;

    public function __construct(MakeRepository $makeRepo)
    {
        $this->makeRepository = $makeRepo;
    }

    /**
     * Display a listing of the Make.
     * GET|HEAD /makes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $makes = $this->makeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(MakeResource::collection($makes), 'Makes retrieved successfully');
    }

    /**
     * Store a newly created Make in storage.
     * POST /makes
     *
     * @param CreateMakeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMakeAPIRequest $request)
    {
        $input = $request->all();

        $make = $this->makeRepository->create($input);

        return $this->sendResponse(new MakeResource($make), 'Make saved successfully');
    }

    /**
     * Display the specified Make.
     * GET|HEAD /makes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Make $make */
        $make = $this->makeRepository->find($id);

        if (empty($make)) {
            return $this->sendError('Make not found');
        }

        return $this->sendResponse(new MakeResource($make), 'Make retrieved successfully');
    }

    /**
     * Update the specified Make in storage.
     * PUT/PATCH /makes/{id}
     *
     * @param int $id
     * @param UpdateMakeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMakeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Make $make */
        $make = $this->makeRepository->find($id);

        if (empty($make)) {
            return $this->sendError('Make not found');
        }

        $make = $this->makeRepository->update($input, $id);

        return $this->sendResponse(new MakeResource($make), 'Make updated successfully');
    }

    /**
     * Remove the specified Make from storage.
     * DELETE /makes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Make $make */
        $make = $this->makeRepository->find($id);

        if (empty($make)) {
            return $this->sendError('Make not found');
        }

        $make->delete();

        return $this->sendSuccess('Make deleted successfully');
    }
}
