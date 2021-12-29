<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Carbon\Carbon;

class ProposalCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $proposalCollection = collect([]);

        $images = collect();

        // $items = $proposal->car->getMedia('cars');
        // foreach($items as $item){
        //     $images->push($item->getUrl());
        //     $images->push($item->getUrl('thumb'));
        // }
        // $items = $proposal->tradein->getMedia();
        // foreach($items as $item){
        //    $images->push($item->getUrl());
        // }

        foreach ($this->collection as $proposal) {

            $avatar_tradein = '';
            $avatar = '';
            // dd($proposal->id);
            if($proposal->car !== null) {
               $avatar = $proposal->car->getFirstMediaUrl('cars','thumb');
            }
            if($proposal->tradein !== null) {
               $avatar_tradein = $proposal->tradein->getFirstMediaUrl('cars','thumb');
            }
        // return [
            $proposalCollection->push([

            'id' => $proposal->id,
            'client_id' => $proposal->client->id ?? '',
            'client' => [
                'name' => $proposal->client->name ?? '',
                'email' => $proposal->client->email ?? '',
                'client_type' => $proposal->client->clientType->name ?? '',
                'nif' => $proposal->client->nif ?? '',
                'city' => $proposal->city,
                'adress' => $proposal->client->adress ?? '',
                'zip_code' => $proposal->client->zip_code ?? '',
                'phone' => $proposal->client->phone ?? '',
                'mobile_phone' => $proposal->client->mobile_phone ?? '',
            ],
            'vendor' => $proposal->vendor->name ?? '',
            'price' => $proposal->car->price ?? '',
            'pos_number' => $proposal->pos_number,
            'prop_value' => $proposal->prop_value,
            'first_contact_date' => $proposal->first_contact_date,
            'last_contact_date' => $proposal->last_contact_date,
            'next_contact_date' => $proposal->next_contact_date,
            'contract' => $proposal->contract,
            'test_drive' => $proposal->test_drive,
            'state' => $proposal->state->name ?? '',
            'car_id' => $proposal->car_id,
            'car' => [
                'name' => $proposal->car->model->make->name ?? '',
                'model' => $proposal->car->model->name ?? '',
                'price' => $proposal->car->price ?? '',
                'avatar' => $avatar ?? '',
            ],
            'tradein_id' => $proposal->tradein_id,
            'tradein' => [
                'make' => $proposal->tradein->model->make->name ?? '',
                'make_id' => $proposal->tradein->model->make->id ?? '',
                'model' => $proposal->tradein->model->name ?? '',
                'model_id' => $proposal->tradein->model->id ?? '',
                'category' => $proposal->tradein->category->name ?? '',
                'category_id' => $proposal->tradein->category->id ?? '',
                'km' => $proposal->tradein->km ?? '',
                'motorization' => $proposal->tradein->motorization ?? '',
                'registration' => $proposal->tradein->registration ?? '',
                'tradein_sale' => $proposal->tradein->tradein_sale ?? '',
                'price' => $proposal->tradein->price ?? '',
                'tradein_observations' => $proposal->tradein->tradein_observations ?? '',
                // cat, km, motor,reg,fuel,valor de compra, valor de venda, obs, 
                // array de imagens
                'avatar' => $avatar_tradein,
                // 'images' => [$images] ?? '',
            ],
            'total_diff_amount' => $proposal->total_diff_amount,
            'total_discount_amount' => $proposal->total_discount_amount,
            'total_discount_perc' => round($proposal->total_discount_perc,2),
            'comment' => $proposal->comment,
            'benefits' => $proposal->benefits,
            'campaigns' => $proposal->campaigns,
            'financings' => $proposal->financings,
            'initial_business_study' => $proposal->initial_business_study_id,
            'final_business_study' => $proposal->final_business_study_id,
            // 'authorization' => $proposal->authorization
            'created_at' => $proposal->created_at,
            'created_at_diff' => $proposal->created_at->diffForHumans(),
            'updated_at' => $proposal->updated_at->isoFormat('D/M/Y'),
            'updated_at_diff' => $proposal->updated_at->diffForHumans()
            ]);

        }
    

        return $proposalCollection;

    }
}
