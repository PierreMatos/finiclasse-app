<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BusinessStudyResource extends JsonResource
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
            'client_id' => $this->client_id,
            'car_id' => $this->car_id,
            'extras_total' => $this->extras_total,
            'sub_total' => $this->sub_total,
            'total_benefits' => $this->total_benefits,
            'selling_price' => $this->selling_price,
            'tradein_id' => $this->tradein_id,
            'tradein_diff' => $this->tradein_diff,
            'settle_amount' => $this->settle_amount,
            'total_diff_amount' => $this->total_diff_amount,
            'total_discount_amount' => $this->total_discount_amount,
            'total_discount_perc' => $this->total_discount_perc,
            'iva' => $this->iva,
            'isv' => $this->isv,
            'business_study_authorization_id' => $this->business_study_authorization_id,
            'business_study_authorization' => [
                'id' => $this->businessStudyAuthorization->id ?? '',
                'name' => $this->businessStudyAuthorization->name ?? '',
                'min' => $this->businessStudyAuthorization->min ?? '',
                'max' => $this->businessStudyAuthorization->max ?? '',
                'responsible_id' => $this->businessStudyAuthorization->responsible_id ?? '',
                'color' => $this->businessStudyAuthorization->color ?? '',
            ],
            'tradein_id' => $this->tradein_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
