<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFinancingAPIRequest;
use App\Http\Requests\API\UpdateFinancingAPIRequest;
use App\Models\Financing;
use App\Repositories\FinancingRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FinancingResource;
use Response;

/**
 * Class FinancingController
 * @package App\Http\Controllers\API
 */

class FinancingAPIController extends AppBaseController
{
    /** @var  FinancingRepository */
    private $financingRepository;

    public function __construct(FinancingRepository $financingRepo)
    {
        $this->financingRepository = $financingRepo;
    }

    /**
     * Display a listing of the Financing.
     * GET|HEAD /financings
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $financings = $this->financingRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FinancingResource::collection($financings), 'Financings retrieved successfully');
    }

    /**
     * Store a newly created Financing in storage.
     * POST /financings
     *
     * @param CreateFinancingAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFinancingAPIRequest $request)
    {
        $input = $request->all();

        $financing = $this->financingRepository->create($input);

        return $this->sendResponse(new FinancingResource($financing), 'Financing saved successfully');
    }

    /**
     * Display the specified Financing.
     * GET|HEAD /financings/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Financing $financing */
        $financing = $this->financingRepository->find($id);

        if (empty($financing)) {
            return $this->sendError('Financing not found');
        }

        return $this->sendResponse(new FinancingResource($financing), 'Financing retrieved successfully');
    }

    /**
     * Update the specified Financing in storage.
     * PUT/PATCH /financings/{id}
     *
     * @param int $id
     * @param UpdateFinancingAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFinancingAPIRequest $request)
    {
        $input = $request->all();

        /** @var Financing $financing */
        $financing = $this->financingRepository->find($id);

        if (empty($financing)) {
            return $this->sendError('Financing not found');
        }

        $financing = $this->financingRepository->update($input, $id);

        return $this->sendResponse(new FinancingResource($financing), 'Financing updated successfully');
    }

    /**
     * Remove the specified Financing from storage.
     * DELETE /financings/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Financing $financing */
        $financing = $this->financingRepository->find($id);

        if (empty($financing)) {
            return $this->sendError('Financing not found');
        }

        $financing->delete();

        return $this->sendSuccess('Financing deleted successfully');
    }
}
