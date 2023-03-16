<?php

namespace App\Http\Requests\Front\Auth;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VerifyUser extends FormRequest
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
            'verify_code' => [
                'required',
                'max:191',
                Rule::exists('users', 'verification_key')
            ]
        ];
    }

    public function messages()
    {
        return [
            'verify_code.exists' => __('lang.code_not_existing')
        ];
    }
}
