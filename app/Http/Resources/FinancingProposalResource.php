<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FinancingProposalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $this->getMedia('avatar')->count();
        $document = $this->getFirstMediaUrl('financingproposal');

        return [
            'id' => $this->id,
            // 'name' => $this->name,
            // 'description' => $this->description,
            // 'value' => $this->value,
            'document' => $document,
            'name' => $this->financings->name,
            'financing_id' => $this->financing_id,
            'proposal_id' => $this->proposal_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
