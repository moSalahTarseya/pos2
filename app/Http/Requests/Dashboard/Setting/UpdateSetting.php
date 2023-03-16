<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSetting extends FormRequest
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
            'default_locale' => 'required|in:en,ar',
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
            'logo' => 'nullable|mimes:jpeg,jpg,png',
            'logo_white' => 'nullable|mimes:jpeg,jpg,png',
            'favicon' => 'nullable|mimes:jpeg,jpg,png',
            'contact_img' => 'nullable|mimes:jpeg,jpg,png',

            'app_store' => 'required|url|max:191',
            'google_play' => 'required|url|max:191',
            'ios_version' => 'required|regex:/^[0-9.]+$/|max:6',
            'android_version' => 'required|regex:/^[0-9.]+$/|max:6',

            'tax' => 'required|integer|min:1|max:100',
            'refund_days' => 'required|integer|min:1|max:100',

            'free_shipping' => 'required|in:0,1',
            'min_order_value' => 'nullable|required_if:free_shipping,==,1|between:1,10000000',

            'site_name.en.value' => 'required|string|max:191',
            'sm_description.en.value' => 'required|string|max:400',
            'address.en.value' => 'nullable|string|max:191',

            'site_name.ar.value' => 'required|string|max:191',
            'sm_description.ar.value' => 'required|string|max:400',
            'address.ar.value' => 'nullable|string|max:191',


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
        if(substr(request('ios_version'), -1, 1) == '.') {
            $this->merge(['ios_version' => substr(request('ios_version'), 0, -1)]);
        }

        if(substr(request('android_version'), -1, 1) == '.') {
            $this->merge(['android_version' => substr(request('android_version'), 0, -1)]);
        }

        if(request()->filled('free_shipping') && (request()->input('free_shipping') == 0)) {
            $this->merge([
                'min_order_value' => null,
            ]);
        }
    }
}
