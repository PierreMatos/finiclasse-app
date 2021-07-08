<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BenefitsProposalsResource extends JsonResource
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
            'benefit_id' => $this->benefit_id,
            'proposal_id' => $this->proposal_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
