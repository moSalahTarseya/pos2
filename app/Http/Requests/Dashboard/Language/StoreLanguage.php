<?php

namespace App\Http\Requests\Dashboard\Language;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class StoreLanguage extends FormRequest
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
                    return Request::routeIs('dashboard.languages.store');
                })
            ],
            'title' => [
                'required',
                'string',
                'max:191',
                Rule::unique('languages', 'title')->ignore($this->route('id'))
            ],
            'slogan' => 'required|string|max:15',
        ];
    }
}
