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
            $items = $car->getMedia();
            foreach($items as $item){
               $images->push($item->getUrl());
            }

            $carCollection->push([
                'id' => $car->id,
                'make' => $car->model->make->name ?? '',
                'model' => $car->model->name ?? '',
                'motorization' => $car->motorization,
                'price' => $car->price,
                'condition' => $car->condition->name ?? '',
                'avatar' => $car->getFirstMediaUrl() ?? '',
            ]);

        }

        return $carCollection;

    }
}