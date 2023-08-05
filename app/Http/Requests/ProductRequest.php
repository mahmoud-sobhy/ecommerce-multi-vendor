<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric|min:1',
            'details' => 'required',
            'color' => 'required',
            'itemWeight' => 'required',
            'countryOfOrigin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name_required'),
            'name.max' =>  __('messages.name_max') ,
            'name.unique' =>  __('messages.name_unique')  ,
            'price.required' =>   __('messages.price_required') ,
            'price.numeric' =>  __('messages.price_numeric') ,
            'price.min' =>  __('messages.price_min')  ,
            'details.required' =>  __('messages.details_required') ,
        ];
    }
}
