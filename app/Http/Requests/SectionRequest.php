<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name'        => 'required|unique:section_translations,name,' .$this->id.',section_id',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => trans('backend/validation.required'),
            'name.unique'          => trans('backend/validation.unique'),
            'description.required' => trans('backend/validation.required'),
        ];
    }
}
