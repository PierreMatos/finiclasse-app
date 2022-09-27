<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProfitMarginAPIRequest;
use App\Http\Requests\API\UpdateProfitMarginAPIRequest;
use App\Models\ProfitMargin;
use App\Repositories\ProfitMarginRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProfitMarginResource;
use Response;

/**
 * Class ProfitMarginController
 * @package App\Http\Controllers\API
 */

class ProfitMarginAPIController extends AppBaseController
{
    /** @var  ProfitMarginRepository */
    private $profitMarginRepository;

    public function __construct(ProfitMarginRepository $profitMarginRepo)
    {
        $this->profitMarginRepository = $profitMarginRepo;
    }

    /**
     * Display a listing of the ProfitMargin.
     * GET|HEAD /profitMargins
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $profitMargins = $this->profitMarginRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ProfitMarginResource::collection($profitMargins), 'Profit Margins retrieved successfully');
    }

    /**
     * Store a newly created ProfitMargin in storage.
     * POST /profitMargins
     *
     * @param CreateProfitMarginAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProfitMarginAPIRequest $request)
    {
        $input = $request->all();

        $profitMargin = $this->profitMarginRepository->create($input);

        return $this->sendResponse(new ProfitMarginResource($profitMargin), 'Profit Margin saved successfully');
    }

    /**
     * Display the specified ProfitMargin.
     * GET|HEAD /profitMargins/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProfitMargin $profitMargin */
        $profitMargin = $this->profitMarginRepository->find($id);

        if (empty($profitMargin)) {
            return $this->sendError('Profit Margin not found');
        }

        return $this->sendResponse(new ProfitMarginResource($profitMargin), 'Profit Margin retrieved successfully');
    }

    /**
     * Update the specified ProfitMargin in storage.
     * PUT/PATCH /profitMargins/{id}
     *
     * @param int $id
     * @param UpdateProfitMarginAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfitMarginAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProfitMargin $profitMargin */
        $profitMargin = $this->profitMarginRepository->find($id);

        if (empty($profitMargin)) {
            return $this->sendError('Profit Margin not found');
        }

        $profitMargin = $this->profitMarginRepository->update($input, $id);

        return $this->sendResponse(new ProfitMarginResource($profitMargin), 'ProfitMargin updated successfully');
    }

    /**
     * Remove the specified ProfitMargin from storage.
     * DELETE /profitMargins/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProfitMargin $profitMargin */
        $profitMargin = $this->profitMarginRepository->find($id);

        if (empty($profitMargin)) {
            return $this->sendError('Profit Margin not found');
        }

        $profitMargin->delete();

        return $this->sendSuccess('Profit Margin deleted successfully');
    }
}
