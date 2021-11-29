<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            // 'password' => $this->password,
            'city' => $this->city,
            'adress' => $this->adress,
            'zip_code' => $this->zip_code,
            'phone' => $this->phone,
            'mobile_phone' => $this->mobile_phone,
            'nif' => $this->nif,
            'gdpr_confirmation' => $this->gdpr_confirmation,
            'gdpr_rejection' => $this->gdpr_rejection,
            'gdpr_type' => $this->gdpr_type,
            'finiclasse_employee' => $this->finiclasse_employee,
            'stand' => $this->stand->name ?? '',
            'service_car' => [
                'plate' => $this->serviceCar->plate ?? '',
                'model' => $this->serviceCar->model->name ?? '',
                'make' => $this->serviceCar->model->make->name ?? '',
            ],
            'client_type' => $this->clientType->name ?? '',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
