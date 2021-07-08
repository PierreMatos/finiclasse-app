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
            // 'business_study_id' => $this->business_study_id,
            // 'business_study' => [
            'car_id' => $this->car_id,
            'tradein_id' => $this->tradein_id,
            // 'car_model' => $this->car->model->name,
            // 'tradein_model' => $this->tradein->model->name,
            // 'business_study_authorization_id' => $this->businessStudy->businessStudyAuthorization, // TODO USER_ID
            'total_diff_amount' => $this->total_diff_amount,
            'total_discount_amount' => $this->total_discount_amount,
            'total_discount_perc' => $this->total_discount_perc,
            // 'benefits' => [
            //     'benefit_id' => $this->benefits->name
            // ],
            // ],
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
