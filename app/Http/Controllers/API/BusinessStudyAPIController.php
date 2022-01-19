<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBusinessStudyAPIRequest;
use App\Http\Requests\API\UpdateBusinessStudyAPIRequest;
use App\Models\BusinessStudy;
use App\Models\Proposal;
use App\Repositories\BusinessStudyRepository;
use App\Repositories\ProposalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BusinessStudyResource;
use App\Http\Controllers\API\ProposalAPIController;

use Response;

/**
 * Class BusinessStudyController
 * @package App\Http\Controllers\API
 */

class BusinessStudyAPIController extends AppBaseController
{
    /** @var  BusinessStudyRepository */
    private $businessStudyRepository;
    private $proposalRepository;


    public function __construct(BusinessStudyRepository $businessStudyRepo,ProposalRepository $proposalRepo)
    {
        $this->businessStudyRepository = $businessStudyRepo;
        $this->proposalRepository = $proposalRepo;

    }

    /**
     * Display a listing of the BusinessStudy.
     * GET|HEAD /businessStudies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $businessStudies = $this->businessStudyRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return BusinessStudy::all();    
        return $this->sendResponse(BusinessStudyResource::collection($businessStudies), 'Business Studies retrieved successfully');
    }

    /**
     * Store a newly created BusinessStudy in storage.
     * POST /businessStudies
     *
     * @param CreateBusinessStudyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBusinessStudyAPIRequest $request)
    {
        $input = $request->all();

        $businessStudy = $this->businessStudyRepository->create($input);

        return $this->sendResponse(new BusinessStudyResource($businessStudy), 'Business Study saved successfully');
    }

    /**
     * Display the specified BusinessStudy.
     * GET|HEAD /businessStudies/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BusinessStudy $businessStudy */
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            return $this->sendError('Business Study not found');
        }

        return $this->sendResponse(new BusinessStudyResource($businessStudy), 'Business Study retrieved successfully');
    }

    /**
     * Update the specified BusinessStudy in storage.
     * PUT/PATCH /businessStudies/{id}
     *
     * @param int $id
     * @param UpdateBusinessStudyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBusinessStudyAPIRequest $request)
    {
        $input = $request->all();

        /** @var BusinessStudy $businessStudy */
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            return $this->sendError('Business Study not found');
        }

        // com os novos valores, volta a re-calcular a margem e guarda os novos valores
        // dd($businessStudy->initialProposal);
        // dd($this->calculate($businessStudy->initialProposal));
        // $this->calculate($businessStudy->initialProposal);

        // $proposals_controller = new ProposalAPIController($proposalRepository,  $businessStudyRepo);
        // $proposals_controller->calculateBusinessStudy($businessStudy->initialProposal);

        $businessStudy = $this->businessStudyRepository->update($input, $id);

        $businessStudyCalculated = (new ProposalAPIController($this->proposalRepository,  $this->businessStudyRepository))->calculateBusinessStudy($businessStudy->initialProposal->id);

        $businessStudy = $this->businessStudyRepository->update($businessStudyCalculated, $id);


        return $this->sendResponse(new BusinessStudyResource($businessStudy), 'BusinessStudy updated successfully');
    }

    /**
     * Remove the specified BusinessStudy from storage.
     * DELETE /businessStudies/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BusinessStudy $businessStudy */
        $businessStudy = $this->businessStudyRepository->find($id);

        if (empty($businessStudy)) {
            return $this->sendError('Business Study not found');
        }

        $businessStudy->delete();

        return $this->sendSuccess('Business Study deleted successfully');
    }

    public function calculate($request){

        $proposal = Proposal::find($request->id);
        
        //get proposal-> campanhas, benefits,... 
        $taxas = ['iva' => 23];
        
        // dd($proposal->campaigns->first()->pivot->value);

        // dd( $proposal->car);

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
            if (is_null($isentIva)) {  $desc = $settleValue / (1 + $iva ); } else{ $desc = $dif; }
            //%
            $profit = $desc / ( $totalBenefits + $isv - ( $ptl + $sigpu + $totalTransf ));

        }else {

            return 'car not found';
        }

        $results = [
            'Preço Base' => $basePrice,
            'Total Extras' => $totalExtras,
            'Sub Total'  => $subTotal,
            'ISV' => $isv,
            'IVA Taxa' => $ivaTX,
            'iva' => $iva,
            'Total' => $total,
            'valor a liquidar' => $settleValue,
            'desc' => $desc,
            'dif' => $dif,
            'profit' => $profit
        ];

        return $results;
        return 'dif é: '.$dif.'desc é: '.$desc.'A margem é de: '.$profit;
        
    }
}
