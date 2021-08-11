<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [

            'name'       => 'required|unique:patient_translations,name,' .$this->id.',patient_id',
            'email'      => 'required|unique:patients,email,' .$this->id,
            // 'date_birth' => 'required',
            'gender'     => 'required',
            'phone'      => 'required|unique:patients,phone,' .$this->id,
            'blood_id'   => 'required',
            'address'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'       => trans('backend/validation.required'),
            'name.unique'         => trans('backend/validation.unique'),
            'email.required'      => trans('backend/validation.required'),
            'email.unique'        => trans('backend/validation.unique'),
            'date_birth.required' => trans('backend/validation.required'),
            'gender.required'     => trans('backend/validation.required'),
            'phone.required'      => trans('backend/validation.required'),
            'phone.unique'        => trans('backend/validation.unique'),
            'blood_id.required'   => trans('backend/validation.required'),
            'address.required'    => trans('backend/validation.required'),
        ];
    }
}
