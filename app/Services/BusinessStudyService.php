<?php

namespace App\Services;

use App\Models\BusinessStudy;
use App\Models\Proposal;
use App\Models\BusinessStudyAuthorization;
use App\Repositories\BusinessStudyRepository;
use App\Repositories\ProposalRepository;


class BusinessStudyService {

    public $proposal;
    private $businessStudyRepository;

    public function __construct(Proposal $proposal, ProposalRepository $proposalRepo, BusinessStudy $bs, BusinessStudyRepository $businessStudyRepo)
    {
        $this->proposal = $proposal;
        $this->businessStudy = $bs;
        $this->proposalRepository = $proposalRepo;
        $this->businessStudyRepository = $businessStudyRepo;


    }

    public function update(BusinessStudy $businessStudy){

        $proposal = Proposal::find($businessStudy->initialProposal->id);
        // $proposal = new Proposal($businessStudy->initialProposal()->get()->toArray());

        if ( (!empty($proposal->car) && !($proposal->isClosed())  && !($proposal->isLost()) )) {

            $this->calculateBusinessStudy($businessStudy);

            if (($proposal->isOpen())) {

                $businessStudy = $this->businessStudyRepository->update($businessStudy->toArray(), $proposal->initial_business_study_id);
            
            } elseif (($proposal->isClosed())) {

                $businessStudy = $this->businessStudyRepository->update($businessStudy->toArray(), $proposal->final_business_study_id);
            }
        }
    }



        public function calculateBusinessStudy(BusinessStudy $businessStudy)
    {

        $proposal = Proposal::find($businessStudy->initialProposal->id);

        //move to db table
        $taxas = ['iva' => 23];

        if (!empty($proposal->car)) {

            $totalCampaigns = 0;
            $totalBenefits = 0;
            $subTotal = 0.0;
            $sellingPrice = 0;
            $purchasePrice = 0;
            $marginIVA = 0;
            $margin = 0;
            $sell = 0;
            $totalTransf = 0;
            $ivaTX = 0;

            $preTotalExtras = $proposal->car->extras_total;
            $basePrice = $proposal->car->price_base;
            $ptl = $proposal->car->ptl;
            $sigpu = $proposal->car->sigpu;
            $isv =  $proposal->car->isv;
            $isv =  $proposal->car->isv;
            $taxes =  $proposal->car->taxes;
            $expenses =  $proposal->car->expenses;
            $warranty =  $proposal->car->warranty;
            $internal_costs = $proposal->initialBusinessStudy->internal_costs;
            $external_costs = $proposal->initialBusinessStudy->external_costs;
            $sale = $proposal->initialBusinessStudy->sale;

            $isentIva = null;

            // if ($proposal->state->name == 'Aberto' || $proposal->state->name == 'Pendente'){
            $sale = $proposal->initialBusinessStudy->sale;
            $totalTransf = $proposal->initialBusinessStudy->total_transf ?? 0;
            $ivaTX = $proposal->initialBusinessStudy->ivatx ?? 0.23;

            $diffTradein = 0;
            $settleValue =  $proposal->initialBusinessStudy->sale;

            // total campaigns
            $totalCampaigns = $proposal->getTotalCampaigns();

            // total benefits
            $totalBenefits = $proposal->getTotalBenefits();

            $totalExtras = $preTotalExtras + $ptl + $sigpu + $totalTransf;

            if ($proposal->car->isUsed()){

                $subTotal = $proposal->car->price - ($totalBenefits + $totalCampaigns);

            }else{

                if ($basePrice != null){

                    $subTotal = $basePrice + $totalExtras - ($totalBenefits + $totalCampaigns);
                }
            }

            // IVA
            // $iva = $ivaTX * $price;
            if ($proposal->car->isNew()) {

                $iva =  $ivaTX * ($subTotal + $isv);
            } else {

                $iva = $ivaTX * $basePrice;
            }

            // TOTAL
            if ($proposal->car->isNew()) {

                $total = $subTotal + $isv + $iva;

            } elseif ($proposal->car->condition_id != 1) {

                $total = $basePrice + $iva;
            }

            $txblBase = $subTotal + $isv;
            $totalValue = $txblBase + $iva;

            // TRADE in
            if (!empty($proposal->tradein)) {

                $purchasePrice = $proposal->tradein->tradein_purchase;
                $sellingPrice = $proposal->tradein->tradein_sale;
                $diffTradein = $sellingPrice - ($taxes + $expenses + $purchasePrice);
                $settleValue = $sale - $purchasePrice;

            }

            //diff
            if ($proposal->car->isNew()) {

                $dif = ($total - $sale) - $diffTradein;

            } else {

                $dif = (($sale - $total) - $diffTradein - $totalExtras) - $totalTransf - $totalBenefits - $internal_costs - $external_costs;
            
            }

           
            //desc
            if (is_null($isentIva)) {

                $desc = $dif / (1 + ($ivaTX));

            } else {

                $desc = $dif;
            }

            //TOTAL BENEFITS
            if ($totalCampaigns) {

                $totalBenefits += $totalCampaigns;

            }

            // $discPerc
            if ($totalBenefits != 0 || $subTotal != 0 || $ptl != 0 || $sigpu != 0 || $totalTransf != 0) {

                $discPerc = ($desc / ($totalBenefits + $subTotal - ($ptl + $sigpu + $totalTransf))) * 100;

                if ($discPerc < 0) {

                    $discPerc = 0;

                } elseif ($discPerc > 100) {

                    $discPerc = 100;

                }
            } else {

                $discPerc = 0;
            }

            if (($totalBenefits + $isv) != 0 && ($ptl + $sigpu + $totalTransf) != 0) {

                $profit = $desc / ($totalBenefits + $isv) - ($ptl + $sigpu + $totalTransf);

            } else {

                $profit = 0;
            }


            if ($proposal->car->isNew()) {

                //margem com  iva, confirmar diff tradein
                $marginIVA = (($sale - $total) - $diffTradein) - ($internal_costs + $external_costs + $warranty) - $totalTransf + $totalBenefits;

                //margem sem IVA
                $margin = $marginIVA / (1 + $ivaTX);
            }


            //atribuir AUTORIZAÇÃO
            $this->setAuthorization($proposal);

        } else {

            return 'car not found';
        }

        return ($businessStudy);

    }


    public function setAuthorization($proposal){


        $sale=0;

        $authorizations = BusinessStudyAuthorization::all();

        $businessStudy = BusinessStudy::find($proposal->initialBusinessStudy->id);

        $business_study_authorization_id = 1;

        foreach ($authorizations as $authorization) {

            $min = $authorization->min;
            $max = $authorization->max;

            if ($proposal->car->isNew()) {

                if ($discPerc >= $min && $discPerc <= $max && ($authorization->id == 1 || $authorization->id == 2 || $authorization->id == 3)) {

                    if ($authorization->id !== 1) {
                        $proposal->state_id = 1;
                        // $proposal->save();

                    } elseif ($authorization->id == 1 && $proposal->state->id !== 2 && $proposal->state->id !== 4 && $sale != null) {
                        $proposal->state_id = 3;
                    }

                    $proposal->save();

                    $business_study_authorization_id = $authorization->id;
                    // return $business_study_authorization_id;
                    $proposal->initialBusinessStudy->business_study_authorization_id =  $authorization->id;
                    $proposal->save();
                }
            }
        }


        if (($proposal->car->condition_id == 2 || $proposal->car->condition_id == 4) && $sale != null) {

            // $auth = $authorizations->find(6);

            if ($margin < 0) {

                // if ($authorization->id !== 1){
                //     $proposal->state_id = 3;
                //     // $proposal->save();

                // }elseif ($authorization->id == 1 && $proposal->state->id !== 2 && $proposal->state->id !== 4) {
                //     $proposal->state_id = 1;
                // }

                $business_study_authorization_id = 6;
                $proposal->initialBusinessStudy->business_study_authorization_id =  6;
                $proposal->state_id = 3;
                $proposal->save();

            } elseif ($margin > 0) {

                $business_study_authorization_id = 7;
                $proposal->initialBusinessStudy->business_study_authorization_id =  7;
                $proposal->state_id = 1;
                $proposal->save();
            }
            // else{
            //     $proposal->state_id = 1;
            //     $proposal->save();
            // }

        }

    }
}
