<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BenefitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // foreach ($this->collection as $benefit) {

        // $pdf = $benefit->getFirstMediaUrl('benefits');

        // }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'pdf' => $this->getFirstMediaUrl('benefits'),
            // 'type' => $this->type,
            // 'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
