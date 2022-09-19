<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BenefitsProposalsResource;
use App\Http\Resources\CampaignsProposalsResource;
use App\Http\Resources\FinancingProposalResource;
use Carbon\Carbon;

class ProposalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->car !== null){
            $pos = $this->car->getFirstMediaUrl('pos');
        }

        $imagesTradein = collect();
        $images = collect();

        if($this->car !== null) {
            $items = $this->car->getMedia('cars');
            $carAvatar = $this->car->getFirstMediaUrl('cars','thumb');
            foreach($items as $item){
                $images->push($item->getUrl());
                $images->push($item->getUrl('thumb'));
            }
        }

        if($this->tradein !== null) {
            $items = $this->tradein->getMedia('cars');
            $tradeinAvatar = $this->tradein->getFirstMediaUrl('cars','thumb');
            foreach($items as $item){
            $imagesTradein->push($item->getUrl());
            }
        }

        return [
            'id' => $this->id,
            'client_id' => $this->client->id ?? '',
            'client' => [
                'name' => $this->client->name ?? '',
                'email' => $this->client->email ?? '',
                'client_type' => $this->client->clientType->name ?? '',
                'nif' => $this->client->nif ?? '',
                'city' => $this->client->city ?? '',
                'adress' => $this->client->adress ?? '',
                'zip_code' => $this->client->zip_code ?? '',
                'phone' => $this->client->phone ?? '',
                'mobile_phone' => $this->client->mobile_phone ?? '',
                'gdpr_confirmation' => $this->client->gdpr_confirmation ?? '',
            ],
            'vendor' => $this->vendor->name ?? '',
            'price' => $this->price ?? '',
            'pos_number' => $this->pos_number ?? '',
            'prop_value' => $this->prop_value ?? '',
            'first_contact_date' => $this->first_contact_date ?? '',
            'last_contact_date' => $this->last_contact_date ?? '',
            'next_contact_date' => $this->next_contact_date ?? '',
            'contract' => $this->contract ?? '',
            'test_drive' => $this->test_drive ?? '',
            'state' => $this->state->name ?? '',
            'state_id' => $this->state->id ?? '',
            'state_color' => $this->state->color ?? '',
            'car_id' => $this->car_id,
            'car' => [
                'id' => $this->car->id ?? '',
                'make_id' => $this->car->model->make->id ?? '',
                'make' => $this->car->model->make->name ?? '',
                'model_id' => $this->car->model->id ?? '',
                'model' => $this->car->model->name ?? '',
                'category_id' => $this->car->category_id ?? '',
                'variant' => $this->car->variant ?? '',
                'price' => $this->car->price ?? '',
                'motorization' => $this->car->motorization ?? '',
                'condition' => $this->car->condition->name ?? '',
                'state' => $this->car->state->name ?? '',
                'registration' => isset($this->car->registration) ? $this->car->registration : '',
                'registration_formatted' => isset($this->car->registration) ? $this->car->registration->isoFormat('M/Y') : '',
                'km' => $this->car->km ?? '',
                'avatar' => $carAvatar ?? '',
                'images' => $images ?? '',
                'pos' => $pos ?? '',
                'komm' => $this->car->komm ?? '',
                'price_base' => $this->car->price_base ?? '',
                'extras_total' => $this->car->extras_total ?? '',
                'sub_total' => $this->car->sub_total ?? '',
                'ptl' => $this->car->ptl ?? '',
                'isv' => $this->car->isv ?? '',
                'iva' => $this->car->iva ?? '',
                'sigpu' => $this->car->sigpu ?? '',
                'total' => $this->car->total ?? '',
            ],
            'tradein_id' => $this->tradein_id,
            'tradein' => [
                'make' => $this->tradein->model->make->name ?? '',
                'make_id' => $this->tradein->model->make->id ?? '',
                'model' => $this->tradein->model->name ?? '',
                'model_id' => $this->tradein->model->id ?? '',
                'category' => $this->tradein->category->name ?? '',
                'category_id' => $this->tradein->variant ?? '',
                'category_id' => $this->tradein->category->id ?? '',
                'km' => $this->tradein->km ?? '',
                'motorization' => $this->tradein->motorization ?? '',
                'registration' => isset($this->tradein->registration) ? $this->tradein->registration->isoFormat('M/Y') : '',
                // 'registration' => isset($this->tradein->registration) ? $this->tradein->registration->isoFormat('M/Y') : '',
                'tradein_purchase' => $this->tradein->tradein_purchase ?? '',
                'tradein_sale' => $this->tradein->tradein_sale ?? '',
                'price' => $this->tradein->price ?? '',
                'tradein_observations' => $this->tradein->tradein_observations ?? '',
                'fuel_id' => $this->tradein->fuel->id ?? '',
                'state_id' => $this->tradein->state->id ?? '',
                'potencial_buyer' => $this->tradein->potencial_buyer ?? '',
                // cat, km, motor,reg,fuel,valor de compra, valor de venda, obs, 
                // array de imagens
                'avatar' => $tradeinAvatar ?? '',
                'images' => $imagesTradein ?? '',
            ],
            'total_diff_amount' => $this->total_diff_amount ?? '',
            'total_discount_amount' => $this->total_discount_amount ?? '',
            'total_discount_perc' => round($this->total_discount_perc,2) ?? '',
            'comment' => $this->comment ?? '',
            'benefits' => BenefitsProposalsResource::collection($this->benefits),
            // 'benefits' => $this->benefits,
            'campaigns' => CampaignsProposalsResource::collection($this->campaigns),
            // 'campaigns' => $this->campaigns,
            'financings' => FinancingProposalResource::collection($this->financings),
            'initial_business_study' => $this->initial_business_study_id,
            'final_business_study' => $this->final_business_study_id,
            // 'authorization' => $this->authorization
            'created_at' => $this->created_at->isoFormat('D/M/Y'),
            'created_at_diff' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->isoFormat('D/M/Y') ?? '',
            'updated_at_diff' => $this->updated_at->diffForHumans()

        ];
    }
}
