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
            'photo' => 'required|image|max:2048',
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
            'photo.required' => 'Please select an image file*.',
            'photo.image' => 'The selected file must be an image*.',
            'photo.max' => 'The selected image may not be greater than 2 megabytes*.',
            'country_of_origin.required' => 'country is req',
            'details.required' =>  __('messages.details_required') ,
        ];
    }
}

