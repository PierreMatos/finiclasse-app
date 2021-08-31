<?php

namespace App\Http\Requests\API;

use App\Models\ClientType;
use InfyOm\Generator\Request\APIRequest;

class UpdateClientTypeAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = ClientType::$rules;
        
        return $rules;
    }
}
