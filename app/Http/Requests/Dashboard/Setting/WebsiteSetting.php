<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteSetting extends FormRequest
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
            'logo' => 'required|image|mimes:jpeg,jpg,png',
            'name.ar.value' => 'required|string|max:150',
            'name.en.value' => 'required|string|max:150',
            'default_locale' => 'required|string|max:150',
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
        if(request()->filled('free_shipping') && (request()->input('free_shipping') == 0)) {
            $this->merge([
                'min_order_value' => null,
            ]);
        }
    }
}
