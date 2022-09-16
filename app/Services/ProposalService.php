<?php

namespace App\Services;

use App\Models\Proposal;
use App\Services\BusinessStudyService;
use App\Repositories\ProposalRepository;

class ProposalService {

    public $proposal;
    private $proposalRepository;
    private $BusinessStudyService;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Proposal $proposal, ProposalRepository $proposalRepo, BusinessStudyService $businessStudyServ)
    {
        $this->proposal = $proposal;
        $this->proposalRepository = $proposalRepo;
        $this->businessStudyService = $businessStudyServ;
    }

    /**
     * Constructs a new instance object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
        
    public function update($input, $id)
    {
        //proposal update
        $proposal = $this->proposalRepository->update($input, $id);

        // Update relations
        //camaigns
        if (!empty($request->campaigns)) {

            $campaigns = $request->campaigns;

            $proposal->campaigns()->detach();

            $proposal->campaigns()->sync($campaigns);
        }

        //benefits
        if (!empty($request->benefits)) {

            $benefits = $request->benefits;

            $proposal->benefits()->detach();

            $proposal->benefits()->sync($benefits);
        }

        //BUSINESS STUDY UPDATE
        $this->businessStudyService->update($proposal->initialBusinessStudy);
         
        //CLOSE PROPOSAL
        if ($proposal->isClosed()){

            $proposal->closeDeal();

        }

        //Event notification
        $this->sendNotifications($proposal);

        return $proposal;
            
    }

    public function closeDeal(){

        $this->car->isSold();

    }

    public function sendNotifications(Proposal $proposal){


        if ($proposal->isShared()) {

            event(new SharedProposal($proposal));

        }

        if ($proposal->isClosed()) {

            event(new ClosedProposal($proposal));

        }

        //Push Notification TradeIn
        if ($proposal->tradein) {

            if($proposal->tradein->isProposed()){

                event(new PushAddTradeIn($proposal));

            }


        }

    }
}