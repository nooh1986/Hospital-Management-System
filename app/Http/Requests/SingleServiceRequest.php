<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SingleServiceRequest extends FormRequest
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
            'name'        => 'required|unique:service_translations,name,' .$this->id,
            'price'       => 'required|numeric',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => trans('backend/validation.required'),
            'name.unique'          => trans('backend/validation.unique'),
            'price.required'       => trans('backend/validation.required'),
            'price.numeric'        => trans('backend/validation.numeric'),
            'description.required' => trans('backend/validation.required'),
        ];
    }
}
