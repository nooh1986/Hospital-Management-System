<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmbulanceRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [

            'car_number'            => 'required|unique:ambulances,car_number,' .$this->id,
            'car_model'             => 'required',
            'car_year_made'         => 'required',
            'driver_name'           => 'required|unique:ambulance_translations,driver_name,' .$this->id.',ambulance_id',
            'driver_license_number' => 'required|unique:ambulances,driver_license_number,' .$this->id,
            'driver_phone'          => 'required|unique:ambulances,driver_phone,' .$this->id,
            'notes'                 => 'required',
        ];
    }

    public function messages()
    {
        return [
            
            'car_number.required'            => trans('backend/validation.required'),
            'car_number.unique'              => trans('backend/validation.unique'),
            'car_model.required'             => trans('backend/validation.required'),
            'car_year_made.required'         => trans('backend/validation.required'),
            'driver_name.required'           => trans('backend/validation.required'),
            'driver_name.unique'             => trans('backend/validation.unique'),
            'driver_license_number.required' => trans('backend/validation.required'),
            'driver_license_number.unique'   => trans('backend/validation.unique'),
            'driver_phone.required'          => trans('backend/validation.required'),
            'driver_phone.unique'            => trans('backend/validation.unique'),
            'notes.required'                 => trans('backend/validation.required'),
        ];
    }
}
