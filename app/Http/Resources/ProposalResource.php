<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        $benefits = collect();

        // dd($this->benefits);

        // if ($this->benefits != null ){

        //     foreach ($this->beneftis as $benefit) {
        //         $benefits->push([
        //         'id' => $this->benfetits->id,
        //         'name' => $this->name,
        //         'type' => $this->type,
        //         'amount' => $this->amount,]
        //         );
        //  }

        // }
        // dd($benefits);


        return [
            'id' => $this->id,
            'client_id' => $this->client->id ?? '',
            'client' => [
                'name' => $this->client->name ?? '',
                'email' => $this->client->email ?? '',
                'nif' => $this->client->nif ?? '',
                'city' => $this->city,
                'adress' => $this->client->adress ?? '',
                'zip_code' => $this->client->zip_code ?? '',
                'phone' => $this->client->phone ?? '',
                'mobile_phone' => $this->client->mobile_phone ?? '',
            ],
            'vendor' => $this->vendor->name ?? '',
            'price' => $this->price,
            'pos_number' => $this->pos_number,
            'prop_value' => $this->prop_value,
            'first_contact_date' => $this->first_contact_date,
            'last_contact_date' => $this->last_contact_date,
            'next_contact_date' => $this->next_contact_date,
            'contract' => $this->contract,
            'test_drive' => $this->test_drive,
            'state' => $this->state->name ?? '',
            
            'car_id' => $this->car_id,
            'tradein_id' => $this->tradein_id,
           
            'total_diff_amount' => $this->total_diff_amount,
            'total_discount_amount' => $this->total_discount_amount,
            'total_discount_perc' => $this->total_discount_perc,
            'comment' => $this->comment,
            'benefits' => $this->benefits,
            'campaigns' => $this->campaigns,
            'financings' => $this->financings,
            // 'authorization' => $this->authorization
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
