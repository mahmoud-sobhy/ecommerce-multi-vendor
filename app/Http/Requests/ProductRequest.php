<?php

namespace App\Http\Requests;

// use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Validation\Rule;

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
            'name' => 'required',
            'price' => 'required',
            'color' => 'required',
            'item_weight' => 'required',
            'country_of_origin' => 'required',
            'details' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('messages.name_required'),
            'price.required' =>   __('messages.price_required') ,
            'color.required' => 'the color is req',
            'item_weight.required' => 'the color is req',
            'country_of_origin.required' => 'country is req',
            'details.required' =>  __('messages.details_required') ,
        ];
    }
}

