<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'model_id' => $this->model_id,
            'variant' => $this->variant,
            'motorization' => $this->motorization,
            'category_id' => $this->category_id,
            'registration' => $this->registration,
            'condition_id' => $this->condition_id,
            'state_id' => $this->state_id,
            'komm' => $this->komm,
            'warranty_stand' => $this->warranty_stand,
            'warranty_make' => $this->warranty_make,
            'plate' => $this->plate,
            'stand_id' => $this->stand_id,
            'price' => $this->price,
            'price_base' => $this->price_base,
            'price_new' => $this->price_new,
            'price_campaign' => $this->price_campaign,
            'tradein' => $this->tradein,
            'tradein_purchase' => $this->tradein_purchase,
            'tradein_sale' => $this->tradein_sale,
            'felxible' => $this->felxible,
            'deductible' => $this->deductible,
            'power' => $this->power,
            'km' => $this->km,
            'transmission_id' => $this->transmission_id,
            'color_interior' => $this->color_interior,
            'color_exterior' => $this->color_exterior,
            'metallic_color' => $this->metallic_color,
            'drive_id' => $this->drive_id,
            'fuel_id' => $this->fuel_id,
            'door' => $this->door,
            'seats' => $this->seats,
            'class_id' => $this->class_id,
            'autonomy' => $this->autonomy,
            'emissions' => $this->emissions,
            'iuc' => $this->iuc,
            'registration_count' => $this->registration_count,
            'order_date' => $this->order_date,
            'arrival_date' => $this->arrival_date,
            'delivery_date' => $this->delivery_date,
            'chassi_number' => $this->chassi_number,
            'iuc_expiration_date' => $this->iuc_expiration_date,
            'inspection_expiration_date' => $this->inspection_expiration_date,
            'tradein_observations' => $this->tradein_observations,
            'consumption' => $this->consumption,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
