<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Repositories\CampaignRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CampaignController extends AppBaseController
{
    /** @var  CampaignRepository */
    private $campaignRepository;

    public function __construct(CampaignRepository $campaignRepo)
    {
        $this->campaignRepository = $campaignRepo;
    }

    /**
     * Display a listing of the Campaign.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $campaigns = $this->campaignRepository->all();

        return view('campaigns.index')
            ->with('campaigns', $campaigns);
    }

    /**
     * Show the form for creating a new Campaign.
     *
     * @return Response
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store a newly created Campaign in storage.
     *
     * @param CreateCampaignRequest $request
     *
     * @return Response
     */
    public function store(CreateCampaignRequest $request)
    {
        $input = $request->all();

        $campaign = $this->campaignRepository->create($input);

        Flash::success('Campaign saved successfully.');

        return redirect(route('campaigns.index'));
    }

    /**
     * Display the specified Campaign.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $campaign = $this->campaignRepository->find($id);

        if (empty($campaign)) {
            Flash::error('Campaign not found');

            return redirect(route('campaigns.index'));
        }

        return view('campaigns.show')->with('campaign', $campaign);
    }

    /**
     * Show the form for editing the specified Campaign.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $campaign = $this->campaignRepository->find($id);

        if (empty($campaign)) {
            Flash::error('Campaign not found');

            return redirect(route('campaigns.index'));
        }

        return view('campaigns.edit')->with('campaign', $campaign);
    }

    /**
     * Update the specified Campaign in storage.
     *
     * @param int $id
     * @param UpdateCampaignRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampaignRequest $request)
    {
        $campaign = $this->campaignRepository->find($id);

        if (empty($campaign)) {
            Flash::error('Campaign not found');

            return redirect(route('campaigns.index'));
        }

        $campaign = $this->campaignRepository->update($request->all(), $id);

        Flash::success('Campaign updated successfully.');

        return redirect(route('campaigns.index'));
    }

    /**
     * Remove the specified Campaign from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $campaign = $this->campaignRepository->find($id);

        if (empty($campaign)) {
            Flash::error('Campaign not found');

            return redirect(route('campaigns.index'));
        }

        $this->campaignRepository->delete($id);

        Flash::success('Campaign deleted successfully.');

        return redirect(route('campaigns.index'));
    }
}
