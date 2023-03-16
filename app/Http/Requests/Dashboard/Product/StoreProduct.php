<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class StoreProduct extends FormRequest
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
            'img' => [
                'nullable',
                'mimes:jpeg,jpg,png',
                Rule::requiredIf(function() {
                    return Request::routeIs('dashboard.products.store');
                })
            ],
            'name' => [
                'required',
                'string',
                'max:191'
            ],
            'price' => 'required|numeric|max:1000000',
            'language_id' => 'required|numeric',
            'description' => 'nullable|string',
        ];
    }
}
