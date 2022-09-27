<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfitMarginResource extends JsonResource
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
            'make_id' => $this->make_id,
            'car_fuel_id' => $this->car_fuel_id,
            'car_category_id' => $this->car_category_id,
            'level_1' => $this->level_1,
            'level_2' => $this->level_2,
            'level_3' => $this->level_3
        ];
    }
}
