<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'description' => 'required',
            'patient_id'  => 'required',
            'debtor'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'debtor.required'        => trans('backend/validation.required'),
            'patient_id.required'    => trans('backend/validation.required'),
            'description.required'   => trans('backend/validation.required'),
        ];
    }
}
