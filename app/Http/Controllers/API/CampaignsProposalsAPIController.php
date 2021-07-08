<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCampaignsProposalsAPIRequest;
use App\Http\Requests\API\UpdateCampaignsProposalsAPIRequest;
use App\Models\CampaignsProposals;
use App\Repositories\CampaignsProposalsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CampaignsProposalsResource;
use App\Http\Resources\CampaignsProposalsCollection;
use Response;

/**
 * Class CampaignsProposalsController
 * @package App\Http\Controllers\API
 */

class CampaignsProposalsAPIController extends AppBaseController
{
    /** @var  CampaignsProposalsRepository */
    private $campaignsProposalsRepository;

    public function __construct(CampaignsProposalsRepository $campaignsProposalsRepo)
    {
        $this->campaignsProposalsRepository = $campaignsProposalsRepo;
    }

    /**
     * Display a listing of the CampaignsProposals.
     * GET|HEAD /campaignsProposals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $campaignsProposals = $this->campaignsProposalsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CampaignsProposalsResource::collection($campaignsProposals), 'Campaigns Proposals retrieved successfully');
    }

    /**
     * Store a newly created CampaignsProposals in storage.
     * POST /campaignsProposals
     *
     * @param CreateCampaignsProposalsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCampaignsProposalsAPIRequest $request)
    {
        $inputs = $request->all();

        $items = collect();

        foreach ($inputs as $input) {

            $campaignsProposals = $this->campaignsProposalsRepository->create($input);

            $items->push($campaignsProposals);

        }

        return $this->sendResponse(new CampaignsProposalsCollection($items), 'Campaigns Proposals saved successfully');
    }

    /**
     * Display the specified CampaignsProposals.
     * GET|HEAD /campaignsProposals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CampaignsProposals $campaignsProposals */
        $campaignsProposals = $this->campaignsProposalsRepository->find($id);

        if (empty($campaignsProposals)) {
            return $this->sendError('Campaigns Proposals not found');
        }

        return $this->sendResponse(new CampaignsProposalsResource($campaignsProposals), 'Campaigns Proposals retrieved successfully');
    }

    /**
     * Update the specified CampaignsProposals in storage.
     * PUT/PATCH /campaignsProposals/{id}
     *
     * @param int $id
     * @param UpdateCampaignsProposalsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampaignsProposalsAPIRequest $request)
    {
        $input = $request->all();

        /** @var CampaignsProposals $campaignsProposals */
        $campaignsProposals = $this->campaignsProposalsRepository->find($id);

        if (empty($campaignsProposals)) {
            return $this->sendError('Campaigns Proposals not found');
        }

        $campaignsProposals = $this->campaignsProposalsRepository->update($input, $id);

        return $this->sendResponse(new CampaignsProposalsResource($campaignsProposals), 'CampaignsProposals updated successfully');
    }

    /**
     * Remove the specified CampaignsProposals from storage.
     * DELETE /campaignsProposals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CampaignsProposals $campaignsProposals */
        $campaignsProposals = $this->campaignsProposalsRepository->find($id);

        if (empty($campaignsProposals)) {
            return $this->sendError('Campaigns Proposals not found');
        }

        $campaignsProposals->delete();

        return $this->sendSuccess('Campaigns Proposals deleted successfully');
    }
}
