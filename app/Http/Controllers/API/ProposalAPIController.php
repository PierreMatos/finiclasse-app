<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProposalAPIRequest;
use App\Http\Requests\API\UpdateProposalAPIRequest;
use App\Models\Proposal;
use App\Models\Car;
use App\Models\BusinessStudy;
use App\Repositories\ProposalRepository;
use App\Repositories\BusinessStudyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ProposalResource;
use App\Http\Resources\ProposalCollection;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use \Illuminate\Support\Facades\Validator;
USE App\Mail\ProposalOrder;
use Illuminate\Support\Facades\Mail;


/**
 * Class ProposalController
 * @package App\Http\Controllers\API
 */

class ProposalAPIController extends AppBaseController
{
    /** @var  ProposalRepository */
    private $proposalRepository;
    private $businessStudyRepository;

    public function __construct(ProposalRepository $proposalRepo, BusinessStudyRepository $businessStudyRepo)
    {
        $this->proposalRepository = $proposalRepo;
        $this->businessStudyRepository = $businessStudyRepo;
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
        
        

        $proposals = $this->proposalRepository->getProposalsByVendor(Auth::id());

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
        
        if($validator->fails()){
            
            return $validator->errors()->toJson();
        }

        // if (proposta completa) {
            // authorization($input->id);
            // }

        $initialBusinessStudy = new BusinessStudy();
        $initialBusinessStudy->save();
        $finalBusinessStudy = new BusinessStudy();
        $finalBusinessStudy->save();

        $request->request->add(['initial_business_study_id' => $initialBusinessStudy->id]); //add request
        $request->request->add(['final_business_study_id' => $finalBusinessStudy->id]); //add request
        $input = $request->all();

        $proposal = $this->proposalRepository->create($input);


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

        if (empty($proposal)) {
            return $this->sendError('Proposal not found');
        }

        $proposal = $this->proposalRepository->update($input, $id);

        //camaigns
        if (!empty($request->campaigns)){
                
            $campaigns = $request->campaigns;

            $proposal->campaigns()->detach();

            $proposal->campaigns()->sync($campaigns);

        }

        //benefits
        if (!empty($request->benefits)){
                
            $benefits = $request->benefits;

            $proposal->benefits()->detach();

            $proposal->benefits()->sync($benefits); 

        }

        //business study
        //TODO falta o SIGPU
        if((!empty($proposal->car)) ){

            
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
                // 'business_study_authorization_id' => $businessStudyCalculated['business_study_authorization_id'],
            ];
    
                if(($proposal->state->name == 'Aberto')){

                    $businessStudy = $this->businessStudyRepository->update($businessStudyInput, $proposal->initial_business_study_id);

                }elseif(($proposal->state->name == 'Fechado')){
                    
                    $businessStudy = $this->businessStudyRepository->update($businessStudyInput, $proposal->final_business_study_id);

                }

        }


        // dd($proposal->state->name == 'Aberto');

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

    public function authorization($id){

        $proposal = Proposal::find($id);
        
        $diff = $proposal->total_discount_perc;

        foreach ($authorizations as $authorization) {

            $min = $authorization->min;
            $max = $authorization->max;

            if($diff > $min && $diff < $max) {

                $proposal->authorization_id = $authorization->id;
            
            }

        }

        return $proposal;

    }

    public function calculateBusinessStudy($id) {

        //TODO pegar modelo de business study

        // estudo de negocio inicial e final
        $proposal = Proposal::find($id);
        
        $taxas = ['iva' => 23];
        

        // if this.proposal->business study exists then initial.proposal => proposal->businessStudy

        //no metodo
        

        if (!empty($proposal->car)) {
            
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

            $isentIva = null;

            if ($proposal->state->name == 'Aberto'){
                $sell = $proposal->initialBusinessStudy->sale;
                $totalTransf = $proposal->initialBusinessStudy->total_transf ?? 0;
                $ivaTX = $proposal->initialBusinessStudy->ivatx ?? 0.23;
                

            }elseif($proposal->state->name == 'Fechado'){
                $sell = $proposal->finalBusinessStudy->sale;
                $totalTransf = $proposal->finalBusinessStudy->total_transf ?? 0;
                $ivaTX = $proposal->finalBusinessStudy->ivatx ?? 0.23;
            }

            //$sell = 43000; // valor gravado no estudo de negocio
            $diffTradein = 0;
            $settleValue = 0;
            
            //TODO Tabela com taxas e valores fixos
            // $ivaTX = 0.23;
            //$ivaTX = $proposal->iva;
            
            $totalCampaigns = 0;
            $totalBenefits = 0;
            $subTotal = 0.0;
            $sellingPrice = 0;
            $purchasePrice = 0;

            // total campaigns
            foreach($proposal->campaigns as $campaign){

                if($campaign->pivot->type == '%'){
    
                    $totalCampaigns += ($campaign->pivot->value/100) * ($basePrice + $preTotalExtras);
    
                }elseif($campaign->pivot->type == '€'){

                    $totalCampaigns += $campaign->pivot->value - ($basePrice + $preTotalExtras);

                }
    
            }

            // total benefits
            
            foreach($proposal->benefits as $benefit){
                
                if ($benefit->pivot->type == '%'){

                    $totalBenefits += ($benefit->pivot->value/100) * ($basePrice + $preTotalExtras);

                }elseif($benefit->pivot->type == '€'){

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

            }elseif($proposal->car->condition_id != 1){
                
                $total = $basePrice + $iva;

            }
            
            // DISCONT
            if (is_null($isentIva)) { ($total - $sell) / (1 + $iva) + $totalBenefits; } else { $total - $sell + $totalBenefits;}
            $txblBase = $subTotal + $isv;
            $totalValue = $txblBase + $iva;

            // TRADE in
            if (!empty($proposal->tradein)){ 
                $purchasePrice = $proposal->tradein->tradein_purchase; 
                $sellingPrice = $proposal->tradein->tradein_sale; 
                
                $diffTradein = $sellingPrice - ($taxes + $expenses + $purchasePrice);
                $settleValue = $sellingPrice - $purchasePrice;
            }
            

            //diff
            if ($proposal->car->condition_id == 1) {

                $dif = ($total - $sell) - $diffTradein;
                
            } else {
                $dif = (($sell - $total) - $diffTradein - $totalExtras) - $totalTransf - $totalBenefits - $internal_costs - $external_costs;
 
            }

            //desc
            if (is_null($isentIva)) { 
                // $x = ($dif*($ivaTX*100))/100;
                // $desc = $dif - $x;
                $desc = $dif / (1+($ivaTX));
                } else{ 
                    $desc = $dif;
                 }

            //TOTAL BENEFITS
            if($totalCampaigns){
                $totalBenefits += $totalCampaigns;
            }

            // $discPerc = 100;
            if($totalBenefits != 0 || $subTotal != 0 || $ptl != 0 || $sigpu != 0 || $totalTransf != 0){

                $discPerc = ($desc / ($totalBenefits + $subTotal - ($ptl + $sigpu + $totalTransf))) * 100;
                
            }else {
                
                $discPerc=0;
            }

            // dd($discPerc);
            //%
            //TODO Division by zero
            // dd(if( ($totalBenefits + $isv) != 0 ));


            if( ($totalBenefits + $isv) != 0 && ($ptl + $sigpu + $totalTransf)!=0) {

                $profit = $desc / ( $totalBenefits + $isv ) - ( $ptl + $sigpu + $totalTransf );

            }else {$profit=0;}

            //atribuir athirização

            // if($profit < $min){
                //nao precisa
            // }
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
            'sale' => $sell,
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
        ];

        return ($results);
        
    }
    public function sendProposal($id) {

        $proposal = Proposal::find($id);

        Mail::send(new ProposalOrder($proposal));
        
        return $this->sendSuccess('E-mail enviado com sucesso!');

        // DD(!empty($proposal->tradein));
        return new ProposalOrder($proposal);


    }

}
