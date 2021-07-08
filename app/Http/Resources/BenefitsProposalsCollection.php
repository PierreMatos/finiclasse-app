<?php

namespace App\Http\Resources;

use App\Http\Resources\BenefitsProposalsResource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BenefitsProposalsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'data' => $this->collection,
        ];
    }
}
