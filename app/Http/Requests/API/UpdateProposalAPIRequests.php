<?php

namespace App\Http\Requests\API;

use App\Models\Proposal;
// use InfyOm\Generator\Request\APIRequest;
// use Illuminate\Http\FormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProposalAPIRequests extends FormRequest
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
        $rules = [
            // 'state_id' => 'required',
            // 'business_study_id' => 'required'
            // 'vendor_id' => 'required'
        ];
        
        return $rules;
    }
}
