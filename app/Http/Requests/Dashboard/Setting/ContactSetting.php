<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class ContactSetting extends FormRequest
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
            'phone_1' => 'required|max:191|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'phone_2' => 'nullable|max:191|min:10|regex:/^([0-9\s\-\+\(\)]*)$/',
            'email_1' => 'required|string|email:rfc,dns|email_address|max:191',
            'email_2' => 'nullable|string|email:rfc,dns|email_address|max:191',
            'tax_number' => 'required|string|max:191',
            'location' => 'nullable|url|max:191',
            'facebook' => 'nullable|url|max:191',
            'twitter' => 'nullable|url|max:191',
            'instagram' => 'nullable|url|max:191',
            'snapchat' => 'nullable|url|max:191',
            'pinterest' => 'nullable|url|max:191',
            'youtube' => 'nullable|url|max:191',
            'contact_img' => 'nullable|mimes:jpeg,jpg,png',
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
