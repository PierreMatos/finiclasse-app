<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaignsProposalsRequest;
use App\Http\Requests\UpdateCampaignsProposalsRequest;
use App\Repositories\CampaignsProposalsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CampaignsProposalsController extends AppBaseController
{
    /** @var  CampaignsProposalsRepository */
    private $campaignsProposalsRepository;

    public function __construct(CampaignsProposalsRepository $campaignsProposalsRepo)
    {
        $this->campaignsProposalsRepository = $campaignsProposalsRepo;
    }

    /**
     * Display a listing of the CampaignsProposals.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $campaignsProposals = $this->campaignsProposalsRepository->all();

        return view('campaigns_proposals.index')
            ->with('campaignsProposals', $campaignsProposals);
    }

    /**
     * Show the form for creating a new CampaignsProposals.
     *
     * @return Response
     */
    public function create()
    {
        return view('campaigns_proposals.create');
    }

    /**
     * Store a newly created CampaignsProposals in storage.
     *
     * @param CreateCampaignsProposalsRequest $request
     *
     * @return Response
     */
    public function store(CreateCampaignsProposalsRequest $request)
    {
        $input = $request->all();

        $campaignsProposals = $this->campaignsProposalsRepository->create($input);

        Flash::success('Campaigns Proposals saved successfully.');

        return redirect(route('campaignProposals.index'));
    }

    /**
     * Display the specified CampaignsProposals.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $campaignsProposals = $this->campaignsProposalsRepository->find($id);

        if (empty($campaignsProposals)) {
            Flash::error('Campaigns Proposals not found');

            return redirect(route('campaignProposals.index'));
        }

        return view('campaigns_proposals.show')->with('campaignsProposals', $campaignsProposals);
    }

    /**
     * Show the form for editing the specified CampaignsProposals.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $campaignsProposals = $this->campaignsProposalsRepository->find($id);

        if (empty($campaignsProposals)) {
            Flash::error('Campaigns Proposals not found');

            return redirect(route('campaignProposals.index'));
        }

        return view('campaigns_proposals.edit')->with('campaignsProposals', $campaignsProposals);
    }

    /**
     * Update the specified CampaignsProposals in storage.
     *
     * @param int $id
     * @param UpdateCampaignsProposalsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampaignsProposalsRequest $request)
    {
        $campaignsProposals = $this->campaignsProposalsRepository->find($id);

        if (empty($campaignsProposals)) {
            Flash::error('Campaigns Proposals not found');

            return redirect(route('campaignProposals.index'));
        }

        $campaignsProposals = $this->campaignsProposalsRepository->update($request->all(), $id);

        Flash::success('Campaigns Proposals updated successfully.');

        return redirect(route('campaignProposals.index'));
    }

    /**
     * Remove the specified CampaignsProposals from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $campaignsProposals = $this->campaignsProposalsRepository->find($id);

        if (empty($campaignsProposals)) {
            Flash::error('Campaigns Proposals not found');

            return redirect(route('campaignProposals.index'));
        }

        $this->campaignsProposalsRepository->delete($id);

        Flash::success('Campaigns Proposals deleted successfully.');

        return redirect(route('campaignProposals.index'));
    }
}
