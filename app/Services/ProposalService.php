<?php

namespace App\Services;

class CartService {

    const MINIMUM_QUANTITY = 1;
    const DEFAULT_INSTANCE = 'shopping-cart';

    protected $session;
    protected $instance;

    /**
     * Constructs a new cart object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
        
    public function update(string $id, string $action): void
    {
        // $input = $request->all();

        /** @var Proposal $proposal */
        $proposal = $this->proposalRepository->find($id);

        //SET CAR AS 'SOLD' WHEN PROPOSAL IS CLOSED
        if ($proposal->isClosed){
            $car->isSold($proposal->car);
        }

        // if ($proposal->car) {

        //     if (isset($input['state_id'])) {

        //         if ($input['state_id'] == 2) {

        //             $car = $this->carRepository->find($proposal->car->id);
        //             $car->state_id = 6;
        //             $car->save();
        //         }
        //     }
        // }


        if (empty($proposal)) {
            return $this->sendError('Proposal not found');
        }

        $proposal = $this->proposalRepository->update($input, $id);

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

        //BUSINESS STUDY CALCULATION
        //Except when proposal is closed or lost
        if ( (!empty($proposal->car) && !($proposal->isClosed())  && !($proposal->state_id->isLost()) )) {

            // $businessStudyCalculated = $this->calculateBusinessStudy($proposal->id);
            // Must return a Business Study
            $businessStudyCalculated = Calculate->calculateBusinessStudy($proposal->id);

              $businessStudyInput = [
                'extras_total2' => $businessStudyCalculated['total_extras2'],
                'extras_total' => $businessStudyCalculated['total_extras'],
                'sub_total' => $businessStudyCalculated['sub_total'],
                'total_benefits' => $businessStudyCalculated['total_benefits'],
                'selling_price' => $businessStudyCalculated['selling_price'],
                'tradein_diff' => $businessStudyCalculated['tradein_diff'],
                'settle_amount' => $businessStudyCalculated['settle_amount'],
                'total_diff_amount' => $businessStudyCalculated['total_diff_amount'],
                'total_discount_amount' => $businessStudyCalculated['total_discount_amount'],
                'total_discount_perc' => $businessStudyCalculated['total_discount_perc'],
                'isv' => $businessStudyCalculated['isv'],
                'iva' => $businessStudyCalculated['iva'],
                'sigpu' => $businessStudyCalculated['sigpu'],
                'ptl' => $businessStudyCalculated['ptl'],
                'base_price' => $businessStudyCalculated['base_price'],
                'total_transf' => $businessStudyCalculated['total_transf'],
                'total' => $businessStudyCalculated['total'],
                'sale' => $businessStudyCalculated['sale'],
                'purchase_price' => $businessStudyCalculated['purchase_price'],
                'expenses' => $businessStudyCalculated['expenses'],
                'taxes' => $businessStudyCalculated['taxes'],
                'warranty' => $businessStudyCalculated['warranty'],
                'internal_costs' => $businessStudyCalculated['internal_costs'],
                'external_costs' => $businessStudyCalculated['external_costs'],
                'marginIVA' => $businessStudyCalculated['marginIVA'],
                'margin' => $businessStudyCalculated['margin'],
                'business_study_authorization_id' => $businessStudyCalculated['business_study_authorization_id']
                // 'business_study_authorization_id' => $businessStudyCalculated['business_study_authorization_id'],
            ];

            if (($proposal->state->name == 'Aberto')) {

                $businessStudy = $this->businessStudyRepository->update($businessStudyInput, $proposal->initial_business_study_id);
            } elseif (($proposal->state->name == 'Fechado')) {

                $businessStudy = $this->businessStudyRepository->update($businessStudyInput, $proposal->final_business_study_id);
            }
        }

        // dd($proposal->state->name == 'Aberto');
        // $proposal = $this->proposalRepository->find($id);

        if ($proposal->state->name == 'Partilhado') {
            //Event notification
            event(new SharedProposal($proposal));
        }

        if ($proposal->state->name == 'Fechado') {
            //Event notification
            event(new ClosedProposal($proposal));
        }

        //Push Notification TradeIn
        if ($request->flag_tradein){

            if (!is_null($proposal->tradein)) {
                if ($proposal->tradein->state_id == 7) {
                    event(new PushAddTradeIn($proposal));
                }
            }

        }
    }
}