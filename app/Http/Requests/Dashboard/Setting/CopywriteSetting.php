<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class CopywriteSetting extends FormRequest
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
            'copyright.en.value' => 'required|string|max:191',
            'copyright.ar.value' => 'required|string|max:191',

            'copyright_link' => [
                'required_with:en.copyright_title_link,ar.copyright_title_link',
                'nullable',
                'url',
                'max:191',
            ],
            'copyright_title_link.en.value' => [
                'required_with:copyright_title_link.ar.value,copyright_link',
                'nullable',
                'string',
                'max:191',
            ],
            'copyright_title_link.ar.value' => [
                'required_with:copyright_title_link.en.value,copyright_link',
                'nullable',
                'string',
                'max:191',
            ],

        ];
    }


    public function attributes()
    {
        return [
            'general_tax' => __('lang.the_general_tax'),
            'general_commission' => __('lang.the_general_commission'),
        ];
    }

    public function prepareForValidation()
    {
    }
}
