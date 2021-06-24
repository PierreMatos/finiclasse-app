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
        $images = collect();
        $items = $this->getMedia();
        foreach($items as $item){
           $images->push($item->getUrl());
        }

        return [
            'id' => $this->id,
            'make' => $this->model->make->name ?? '',
            'model_id' => $this->model->name ?? '',
            'variant' => $this->variant,
            'motorization' => $this->motorization,
            'category' => $this->category->name,
            'category_id' => $this->category_id ?? '',
            'registration' => $this->registration,
            'condition' => $this->condition->name ?? '',
            'state' => $this->state->name ?? '',
            'komm' => $this->komm,
            'warranty_stand' => $this->warranty_stand,
            'warranty_make' => $this->warranty_make,
            'plate' => $this->plate,
            'stand' => $this->stand->name ?? '',
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
            'transmission' => $this->transmission->name ?? '',
            'color_interior' => $this->color_interior,
            'color_exterior' => $this->color_exterior,
            'metallic_color' => $this->metallic_color,
            'drive' => $this->drive->name ?? '',
            'fuel' => $this->fuel->name ?? '',
            'door' => $this->door,
            'seats' => $this->seats,
            'class' => $this->class->name ?? '',
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
            'updated_at' => $this->updated_at,
            'avatar' => $this->getFirstMediaUrl(),
            'images' => [$images]
               
        ];
    }
}
