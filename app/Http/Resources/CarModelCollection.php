<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CarModelCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'make' => [
                'name' => $this->make->name ?? '',
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
        // return parent::toArray($request);
    }
}
