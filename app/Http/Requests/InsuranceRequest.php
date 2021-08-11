<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsuranceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [

            'insurance_code'      => 'required|unique:insurances,insurance_code,' .$this->id,
            'name'                => 'required|unique:insurance_translations,name,' .$this->id.',insurance_id',
            'discount_percentage' => 'required',
            'company_rate'        => 'required',
            'notes'               => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                => trans('backend/validation.required'),
            'name.unique'                  => trans('backend/validation.unique'),
            'insurance_code.required'      => trans('backend/validation.required'),
            'insurance_code.unique'        => trans('backend/validation.unique'),
            'discount_percentage.required' => trans('backend/validation.required'),
            'company_rate.required'        => trans('backend/validation.required'),
            'notes.required'               => trans('backend/validation.required'),
        ];
    }
}
