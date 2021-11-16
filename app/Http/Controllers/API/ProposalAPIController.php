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
        
        

        $proposals = $this->proposalRepository->getProposals(Auth::id());

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
        
        if((!empty($proposal->car)) && ($proposal->state->name == 'Aberto')){


            $businessStudyCalculated = $this->businessStudy($proposal->id);

            // if (empty($businessStudy->extras_total)){
            //     $extras_total = $proposal->car->extras_total;
            // }else {
            //     $extras_total = $businessStudy->extras_total;
            // }
    

            $businessStudyInput = [
                'pre_extras_total' => $businessStudyCalculated['Pre_Total_Extras'],
                'total_extras' => $businessStudyCalculated['Total_Extras'],
                'isv' => $businessStudyCalculated['ISV'],
                'iva' => $businessStudyCalculated['iva'],
                'sigpu' => $businessStudyCalculated['SIGPU'],
                'ptl' => $businessStudyCalculated['PTL'],
                'base_price' => $businessStudyCalculated['Base_Price'],
                'total_transf' => $businessStudyCalculated['Total_Trans'],
            ];
    
            $businessStudy = $this->businessStudyRepository->update($businessStudyInput, $proposal->initial_business_study_id);

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

    public function businessStudy($id) {

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
            $totalTransf = 0;
            $isentIva = null;
            $sell = 43000;
            $diffTradein = 0;
            $settleValue = 0;
            $ivaTX = 0.23;
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
            if (is_null($isentIva)) {
                $iva =  $ivaTX * ($subTotal + $isv); 
            } else { 
                $iva = 0; 
            }

            $total = $subTotal + $isv + $iva;
            
            // DISCONT
            if (is_null($isentIva)) { ($total - $sell) / (1 + $iva) + $totalBenefits; } else { $total - $sell + $totalBenefits;}
            $txblBase = $subTotal + $isv;
            $totalValue = $txblBase + $iva;

            // TRADE in
            if (!empty($proposal->tradein)){ 
                $purchasePrice = $proposal->tradein->tradein_purchase; 
                $sellingPrice = $proposal->tradein->tradein_sale; 
                $diffTradein = 0;
                $settleValue = $sell - $purchasePrice;
            }
            
            //diff
            $dif = ($total - $sell) - $diffTradein;
            //desc
            if (is_null($isentIva)) { 
                 $desc = $dif / (1 + $ivaTX ); 
                } else{ 
                    $desc = $dif;
                 }
            //%
            $profit = $desc / ( $totalBenefits + $isv ) - ( $ptl + $sigpu + $totalTransf );

        }else {

            return 'car not found';
        }


        
        
        $results = [
            'Base_Price' => $basePrice,
            'Pre_Total_Extras' => $preTotalExtras,
            'PTL' => $ptl,
            'SIGPU' => $sigpu,
            'Total_Trans' => $totalTransf,
            'Total Apoios' => $totalBenefits,
            'Total_Extras' => $totalExtras,
            'Sub Total'  => $subTotal,
            'ISV' => $isv,
            'IVA Taxa' => $ivaTX,
            'iva' => $iva,
            'Total' => $total,
            'Venda (static)' => $sell,
            'Valor de compra' => $sellingPrice,
            'Valor de venda' => $purchasePrice,
            'Dif de retoma' => $diffTradein,
            'valor a liquidar' => $settleValue,
            'desc' => $desc,
            'dif' => $dif,
            'profit' => $profit,
            'benefits' => $proposal->benefits,
            'campaigns' => $proposal->campaigns,
            'tradein' => $proposal->tradein,
        ];

        return ($results);
        return 'dif é: '.$dif.'desc é: '.$desc.'A margem é de: '.$profit;
        
    }
}
