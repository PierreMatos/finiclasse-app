<?php

namespace App\Http\Controllers\API;

use Response;
use App\Models\Car;
use App\Models\Proposal;
use App\Mail\ProposalOrder;
use Illuminate\Http\Request;
use App\Mail\TradeInApproval;
use App\Models\BusinessStudy;
use App\Mail\ProposalApproval;
use App\Providers\ClosedProposal;
use App\Providers\SharedProposal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use App\Repositories\CarRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ProposalResource;
use App\Repositories\ProposalRepository;
use \Illuminate\Support\Facades\Validator;
use App\Http\Resources\ProposalCollection;
use App\Models\BusinessStudyAuthorization;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BusinessStudyRepository;
use App\Http\Requests\API\CreateProposalAPIRequest;
use App\Http\Requests\API\UpdateProposalAPIRequest;
use App\Repositories\BusinessStudyAuthorizationRepository;


/**
 * Class ProposalController
 * @package App\Http\Controllers\API
 */

class ProposalAPIController extends AppBaseController
{
    /** @var  ProposalRepository */
    private $proposalRepository;
    private $businessStudyRepository;
    private $carRepository;
    // private $businessStudyAuthorizationRepository;

    public function __construct(ProposalRepository $proposalRepo, BusinessStudyRepository $businessStudyRepo, CarRepository $carRepo)
    {
        $this->proposalRepository = $proposalRepo;
        $this->businessStudyRepository = $businessStudyRepo;
        $this->carRepository = $carRepo;
        // $this->businessStudyAuthorizationRepository = $businessStudyAuthorizationRepo;
    }

    /**
     * Display a listing of the Proposal.
     * GET|HEAD /proposalss
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        // $pages=5;

        // if ($request->state != null) {

        //     $proposals = Proposal::where('state_id','=',$request->state)
        //     ->where('vendor_id','=',Auth::id())
        //     ->simplePaginate($pages);

        // } else {

        //     $proposals = Proposal::simplePaginate($pages);

        // }


        // $proposals = $this->proposalRepository->all(
        //     $request->except(['skip', 'limit'])
        // );

        $proposals = $this->proposalRepository->getProposalsByVendor(Auth::id());


        return (new ProposalCollection($proposals));
        // this is working
        // return new ProposalCollection(Proposal::paginate());

        return $this->sendResponse(new ProposalCollection($proposals), 'Proposals retrieved successfully');

        // return $proposals->paginate(5);
        // return new ProposalCollection($proposals::simplePaginate());

        // // $proposals->paginate(2);
        // return new ProposalResource(Proposal::paginate(2));

        // return $this->sendResponse(ProposalResource::collection($proposals), 'Proposals retrieved successfully');
        // return $this->sendResponse(ProposalResource::collection($proposals), 'Proposals retrieved successfully');
    }

    /**
     * Store a newly created Proposal in storage.
     * POST /proposals
     *
     * @param CreateProposalAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vendor_id' => 'required',
        ]);

        if ($validator->fails()) {

            return $validator->errors()->toJson();
        }

        $initialBusinessStudy = new BusinessStudy();
        $initialBusinessStudy->save();
        $finalBusinessStudy = new BusinessStudy();
        $finalBusinessStudy->save();

        $request->request->add(['initial_business_study_id' => $initialBusinessStudy->id]); //add request
        $request->request->add(['final_business_study_id' => $finalBusinessStudy->id]); //add request
        $input = $request->all();

        $proposal = $this->proposalRepository->create($input);

        //Push Notification TradeIn
        if ($proposal->tradein !== null) {
            event(new PushAddTradeIn($proposal)); 
        }

        return $this->sendResponse(new ProposalResource($proposal), 'Proposal saved successfully');
    }

    /**
     * Display the specified Proposal.
     * GET|HEAD /proposals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Proposal $proposal */
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            return $this->sendError('Proposal not found');
        }

        return $this->sendResponse(new ProposalResource($proposal), 'Proposal retrieved successfully');
    }

    /**
     * Update the specified Proposal in storage.
     * PUT/PATCH /proposals/{id}
     *
     * @param int $id
     * @param UpdateProposalAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateProposalAPIRequest $request)
    public function update($id, Request $request)
    {
        $input = $request->all();

        /** @var Proposal $proposal */
        $proposal = $this->proposalRepository->find($id);

        //SET CAR AS 'SOLD' WHEN PROPOSAL IS CLOSED
        if ($proposal->car) {

            if (isset($input['state_id'])) {

                if ($input['state_id'] == 2) {

                    $car = $this->carRepository->find($proposal->car->id);
                    $car->state_id = 6;
                    $car->save();
                }
            }
        }


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
        if ((!empty($proposal->car) && $proposal->state_id !== 2 && $proposal->state_id !== 4)) {

            $businessStudyCalculated = $this->calculateBusinessStudy($proposal->id);

            // if (empty($businessStudy->extras_total)){
            //     $extras_total = $proposal->car->extras_total;
            // }else {
            //     $extras_total = $businessStudy->extras_total;
            // }


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


        return $this->sendResponse(new ProposalResource($proposal), 'Proposal updated successfully');
    }

    /**
     * Remove the specified Proposal from storage.
     * DELETE /proposals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Proposal $proposal */
        $proposal = $this->proposalRepository->find($id);

        if (empty($proposal)) {
            return $this->sendError('Proposal not found');
        }

        $proposal->delete();

        return $this->sendSuccess('Proposal deleted successfully');
    }

    public function authorization($id)
    {

        $proposal = Proposal::find($id);

        $authorizations = BusinessStudyAuthorization::all();

        $businessStudy = BusinessStudy::find($proposal->initialBusinessStudy->id);
        // $businessStudy->business_study_authorization_id = 2;

        // dd($businessStudy);
        // $authorizations = $businessStudyAuthorizationRepository->all();

        $diff = $proposal->initialBusinessStudy->total_discount_perc;

        // foreach ($authorizations as $authorization) {

        //     $min = $authorization->min;
        //     $max = $authorization->max;

        //     if($diff > $min && $diff < $max) {

        //         //se bater
        //         if ($authorization->id != 1){

        //             // $proposal->state_id = 3;
        //             $proposal->save();

        //         }

        //         $businessStudy->business_study_authorization_id = $authorization->id;
        //         $businessStudy->save();


        //     }

        // }

        return $proposal;
    }

    public function calculateBusinessStudy($id)
    {

        //TODO pegar modelo de business study

        // estudo de negocio inicial e final
        $proposal = Proposal::find($id);

        $taxas = ['iva' => 23];


        // if this.proposal->business study exists then initial.proposal => proposal->businessStudy

        //no metodo


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


            // }
            // elseif($proposal->state->name == 'Fechado'){
            //     $sale = $proposal->finalBusinessStudy->sale;
            //     $totalTransf = $proposal->finalBusinessStudy->total_transf ?? 0;
            //     $ivaTX = $proposal->finalBusinessStudy->ivatx ?? 0.23;
            // }

            //$sell = 43000; // valor gravado no estudo de negocio
            $diffTradein = 0;
            $settleValue =  $proposal->initialBusinessStudy->sale;

            //TODO Tabela com taxas e valores fixos
            // $ivaTX = 0.23;
            //$ivaTX = $proposal->iva;



            // total campaigns
            foreach ($proposal->campaigns as $campaign) {

                if ($campaign->pivot->type == '%') {

                    $totalCampaigns += ($campaign->pivot->value / 100) * ($basePrice + $preTotalExtras);
                } elseif ($campaign->pivot->type == '€') {

                    $totalCampaigns += $campaign->pivot->value - ($basePrice + $preTotalExtras);
                }
            }

            // total benefits

            foreach ($proposal->benefits as $benefit) {

                if ($benefit->pivot->type == '%') {

                    $totalBenefits += ($benefit->pivot->value / 100) * ($basePrice + $preTotalExtras);
                } elseif ($benefit->pivot->type == '€') {

                    $totalBenefits += $benefit->pivot->value;
                }
            }

            // $totalBenefits = [$BenefitN * ($basePrice + $Extras)];

            $totalExtras = $preTotalExtras + $ptl + $sigpu + $totalTransf;
            $subTotal = $basePrice + $totalExtras - ($totalBenefits + $totalCampaigns);

            // IVA
            // $iva = $ivaTX * $price;
            if ($proposal->car->condition_id == 1) {
                $iva =  $ivaTX * ($subTotal + $isv);
            } else {
                $iva = $ivaTX * $basePrice;
            }

            // TOTAL
            if ($proposal->car->condition_id == 1) {

                $total = $subTotal + $isv + $iva;
            } elseif ($proposal->car->condition_id != 1) {

                $total = $basePrice + $iva;
            }

            // DISCONT
            // if (is_null($isentIva)) { ($total - $sell) / (1 + $iva) + $totalBenefits; } else { $total - $sell + $totalBenefits;}
            $txblBase = $subTotal + $isv;
            $totalValue = $txblBase + $iva;

            // TRADE in
            if (!empty($proposal->tradein)) {
                $purchasePrice = $proposal->tradein->tradein_purchase;
                $sellingPrice = $proposal->tradein->tradein_sale;

                $diffTradein = $sellingPrice - ($taxes + $expenses + $purchasePrice);
                // $settleValue = $sellingPrice - $purchasePrice;
                $settleValue = $sale - $purchasePrice;
            }


            //diff
            if ($proposal->car->condition_id == 1) {

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

            // $discPerc = 100;
            if ($totalBenefits != 0 || $subTotal != 0 || $ptl != 0 || $sigpu != 0 || $totalTransf != 0) {

                $discPerc = ($desc / ($totalBenefits + $subTotal - ($ptl + $sigpu + $totalTransf))) * 100;
                if ($discPerc < 0) {
                    $discPerc = 0;
                }
            } else {

                $discPerc = 0;
            }

            // dd($discPerc);
            //%
            //TODO Division by zero
            // dd(if( ($totalBenefits + $isv) != 0 ));

            if (($totalBenefits + $isv) != 0 && ($ptl + $sigpu + $totalTransf) != 0) {

                $profit = $desc / ($totalBenefits + $isv) - ($ptl + $sigpu + $totalTransf);
            } else {
                $profit = 0;
            }


            if ($proposal->car->condition_id !== 1) {

                //margem com  iva, confirmar diff tradein
                $marginIVA = (($sale - $total) - $diffTradein) - ($internal_costs + $external_costs + $warranty) - $totalTransf + $totalBenefits;

                //margem sem IVA
                $margin = $marginIVA / (1 + $ivaTX);
            }


            //atribuir AUTORIZAÇÃO
            //check final business study

            // $this->authorization($id);

            $authorizations = BusinessStudyAuthorization::all();

            $businessStudy = BusinessStudy::find($proposal->initialBusinessStudy->id);
            // $businessStudy->business_study_authorization_id = 2;

            // dd($businessStudy);
            // $authorizations = $businessStudyAuthorizationRepository->all();


            $business_study_authorization_id = 1;
            foreach ($authorizations as $authorization) {

                $min = $authorization->min;
                $max = $authorization->max;

                // dd($discPerc);
                if ($proposal->car->condition_id == 1) {

                    if ($discPerc >= $min && $discPerc < $max && $authorization->id !== 6) {

                        if ($authorization->id !== 1) {
                            $proposal->state_id = 3;
                            // $proposal->save();

                        } elseif ($authorization->id == 1 && $proposal->state->id !== 2 && $proposal->state->id !== 4) {
                            $proposal->state_id = 1;
                        }

                        $proposal->save();

                        $business_study_authorization_id = $authorization->id;
                        // return $business_study_authorization_id;
                        $proposal->initialBusinessStudy->business_study_authorization_id =  $authorization->id;
                        $proposal->save();
                    }
                }
            }


            if ($proposal->car->condition_id == 2 || $proposal->car->condition_id == 4) {

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
        } else {

            return 'car not found';
        }

        $results = [
            'base_price' => $basePrice,
            'total_extras' =>  $proposal->car->extras_total,
            'ptl' => $ptl,
            'sigpu' => $sigpu,
            'total_transf' => $totalTransf,
            'total_benefits' => $totalBenefits,
            'total_extras2' => $totalExtras,
            'sub_total'  => $subTotal,
            'isv' => $isv,
            'IVA Taxa' => $ivaTX,
            'iva' => $iva,
            'total' => $total,
            'sale' => $sale,
            'selling_price' => $sellingPrice,
            'purchase_price' => $purchasePrice,
            'tradein_diff' => $diffTradein,
            'settle_amount' => $settleValue,
            'total_diff_amount' => $dif,
            'total_discount_amount' => $desc,
            'total_discount_perc' => $discPerc,
            'profit' => $profit,
            'benefits' => $proposal->benefits,
            'campaigns' => $proposal->campaigns,
            'tradein' => $proposal->tradein,
            'expenses' => $expenses,
            'taxes' => $taxes,
            'warranty' => $warranty,
            'internal_costs' => $internal_costs,
            'external_costs' => $external_costs,
            'marginIVA' => $marginIVA,
            'margin' => $margin,
            'business_study_authorization_id' => $business_study_authorization_id,
        ];

        return ($results);
    }
    public function sendProposal($id)
    {


        //TODO mudar estado da proposta

        $proposal = Proposal::find($id);

        Mail::send(new ProposalOrder($proposal));

        $proposal->state_id = 5;
        $proposal->save();
        return $this->sendSuccess('E-mail enviado com sucesso!');

        // DD(!empty($proposal->tradein));
        return new ProposalOrder($proposal);
    }

    public function proposalApproval($id)
    {

        $proposal = Proposal::find($id);
        $authID = $proposal->initialBusinessStudy->businessStudyAuthorization->id;

        // $x = $proposal->initialBusinessStudy->businessStudyAuthorization->responsible->email;
        // dd($x);

        if ($authID == 2 || $authID == 3 || $authID == 6) {

            $x = $proposal->initialBusinessStudy->businessStudyAuthorization->responsible_id;


            Mail::send(new ProposalApproval($proposal));
        }


        return $this->sendSuccess('E-mail enviado com sucesso!');
    }

    public function tradeInApproval($id)
    {

        $proposal = Proposal::find($id);

        Mail::send(new TradeInApproval($proposal));
        // Pedido de validaçao de retoma
        // if ($request->state_id == 7) {

        //     Mail::send(new ProposalApproval($proposal));

        // }
        return $this->sendSuccess('E-mail enviado com sucesso!');
    }

    public function proposalHistory($client)
    {
        $proposals = $this->proposalRepository->proposalHistory(Auth::id(), $client);

        return $this->sendResponse(new ProposalCollection($proposals), 'Proposals retrieved successfully');
    }
}
