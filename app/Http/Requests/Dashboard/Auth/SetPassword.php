<?php

namespace App\Http\Requests\Dashboard\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SetPassword extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:191',
                Rule::exists('admins', 'email'),
            ],
            'password' => 'required|string|confirmed|min:6|max:191'
        ];
    }
}
