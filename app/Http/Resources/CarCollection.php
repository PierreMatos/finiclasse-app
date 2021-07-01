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

        $carCollection = collect([]);

        foreach ($this->collection as $car) {

            $carCollection->push([
                'id' => $car->id,
                'make' => $car->model->make->name ?? '',
                'model' => $car->model->name ?? '',
                'motorization' => $car->motorization,
                'price' => $car->price,
                'condition' => $car->condition->name,
            ]);

        }

        return $carCollection;

    }
}
