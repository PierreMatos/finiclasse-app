<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStandAPIRequest;
use App\Http\Requests\API\UpdateStandAPIRequest;
use App\Models\Stand;
use App\Repositories\StandRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\StandResource;
use Response;

/**
 * Class StandController
 * @package App\Http\Controllers\API
 */

class StandAPIController extends AppBaseController
{
    /** @var  StandRepository */
    private $standRepository;

    public function __construct(StandRepository $standRepo)
    {
        $this->standRepository = $standRepo;
    }

    /**
     * Display a listing of the Stand.
     * GET|HEAD /stands
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $stands = $this->standRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(StandResource::collection($stands), 'Stands retrieved successfully');
    }

    /**
     * Store a newly created Stand in storage.
     * POST /stands
     *
     * @param CreateStandAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStandAPIRequest $request)
    {
        $input = $request->all();

        $stand = $this->standRepository->create($input);

        return $this->sendResponse(new StandResource($stand), 'Stand saved successfully');
    }

    /**
     * Display the specified Stand.
     * GET|HEAD /stands/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Stand $stand */
        $stand = $this->standRepository->find($id);

        if (empty($stand)) {
            return $this->sendError('Stand not found');
        }

        return $this->sendResponse(new StandResource($stand), 'Stand retrieved successfully');
    }

    /**
     * Update the specified Stand in storage.
     * PUT/PATCH /stands/{id}
     *
     * @param int $id
     * @param UpdateStandAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStandAPIRequest $request)
    {
        $input = $request->all();

        /** @var Stand $stand */
        $stand = $this->standRepository->find($id);

        if (empty($stand)) {
            return $this->sendError('Stand not found');
        }

        $stand = $this->standRepository->update($input, $id);

        return $this->sendResponse(new StandResource($stand), 'Stand updated successfully');
    }

    /**
     * Remove the specified Stand from storage.
     * DELETE /stands/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Stand $stand */
        $stand = $this->standRepository->find($id);

        if (empty($stand)) {
            return $this->sendError('Stand not found');
        }

        $stand->delete();

        return $this->sendSuccess('Stand deleted successfully');
    }
}
