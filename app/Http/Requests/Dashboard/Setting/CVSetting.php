<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;

class CVSetting extends FormRequest
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
            'tax' => 'required|integer|min:1|max:100',
            'refund_days' => 'required|integer|min:1|max:100',
            'free_shipping' => 'required|in:0,1',
            'min_order_value' => 'nullable|required_if:free_shipping,==,1|between:1,10000000',
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
