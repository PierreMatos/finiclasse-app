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
            'client_id' => $this->client_id,
            'vendor_id' => $this->vendor_id,
            'price' => $this->price,
            'pos_number' => $this->pos_number,
            'prop_value' => $this->prop_value,
            'first_contact_date' => $this->first_contact_date,
            'last_contact_date' => $this->last_contact_date,
            'next_contact_date' => $this->next_contact_date,
            'contract' => $this->contract,
            'test_drive' => $this->test_drive,
            'state_id' => $this->state_id,
            'business_study_id' => $this->business_study_id,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
