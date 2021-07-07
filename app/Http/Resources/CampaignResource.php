<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'make_id' => $this->make_id,
            'model_id' => $this->model_id,
            'type' => $this->type,
            'amount' => $this->amount,
            'beginning' => $this->beginning,
            'end' => $this->end,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
