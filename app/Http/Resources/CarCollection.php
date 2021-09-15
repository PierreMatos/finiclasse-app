<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CarCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

      
        // return [
            // 'data' => $this->collection,
            // 'id' => $this->id,
            // 'make' => $this->model->make->name ?? '',
            // 'model_id' => $this->model->name ?? '',
        // ];

        $carCollection = collect([]);

        foreach ($this->collection as $car) {

            $images = collect();
            $items = $car->getMedia('cars');
            $avatar = $car->getFirstMediaUrl('cars','thumb');
            foreach($items as $item){
               $images->push($item->getUrl());
            }

            $carCollection->push([
                'id' => $car->id,
                'make' => $car->model->make->name ?? '',
                'model' => $car->model->name ?? '',
                'motorization' => $car->motorization,
                'price' => $car->price,
                'km' => $car->km,
                'registration' => $car->registration,
                'condition' => $car->condition->name ?? '',
                'avatar' => $avatar,
                'created_at' => $car->created_at,
                'created_at_diff' => $car->created_at->diffForHumans(),
                'updated_at' => $car->updated_at->isoFormat('D/M/Y'),
                'updated_at_diff' => $car->updated_at->diffForHumans()
            ]);

        }

        return $carCollection;

    }
}
