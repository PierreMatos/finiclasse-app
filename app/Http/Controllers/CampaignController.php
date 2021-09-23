<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Repositories\CampaignRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Flash;
use Response;
use Spatie\MediaLibrary\Support\MediaStream;

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

        $document = $request->file('document');

        if ($request->hasFile('document') == null) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();
            $campaign = $this->campaignRepository->create($input);
            $campaign->addMedia($document)->toMediaCollection('campaigns');
        }

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

        //Apagar imagem antiga se for mudada  
        if ($request->hasFile('document')) {
            $campaign->clearMediaCollection('campaigns');
        }

        //Verificar se o file existe
        $document = $request->file('document');

        if ($request->hasFile('document') == null) {
            //Passar a variable input sem colocar nova imagem
            $input = $request->all();
        } else {
            //Actualizar imagem se colocar uma nova
            $input = $request->all();
            $campaign->addMedia($document)->toMediaCollection('campaigns');
        }

        if (empty($campaign)) {
            Flash::error('Campaign not found');

            return redirect(route('campaigns.index'));
        }

        $campaign = $this->campaignRepository->update($input, $id);

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
        $campaign->clearMediaCollection('campaigns');

        Flash::success('Campaign deleted successfully.');

        return redirect(route('campaigns.index'));
    }

    public function download(Campaign $campaign, $id)
    {
        $campaign = $this->campaignRepository->find($id);

        // Let's get some media.
        $downloads = $campaign->getMedia('campaigns');

        // Download the files associated with the media in a streamed way.
        // No prob if your files are very large.
        return MediaStream::create('files.zip')->addMedia($downloads);
    }
}
