<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
        return [
            'name'         => 'required|unique:doctor_translations,name,' .$this->id.',doctor_id',
            'email'        => 'required|email|unique:doctors,email' .$this->id,
            'password'     => 'required',
            // 'phon'         => 'required|unique:doctors,phone' .$this->id,
            'section_id'   => 'required',
            'appointments' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => trans('backend/validation.required'),
            'name.unique'           => trans('backend/validation.unique'),
            'email.required'        => trans('backend/validation.required'),
            'email.unique'          => trans('backend/validation.unique'),
            'email.email'           => trans('backend/validation.email'),
            'password.required'     => trans('backend/validation.required'),
            'phon.required'         => trans('backend/validation.required'),
            'phon.numeric'          => trans('backend/validation.numeric'),
            'section_id.required'   => trans('backend/validation.required'),
            'appointments.required' => trans('backend/validation.required'),
        ];
    }
}
