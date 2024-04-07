<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserRegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    // public function messages()
    // {
    //     // return [
    //     //     'name.required' => "The name field is required.",
    //     //     'email.required' => "The email field is required.",
    //     //     'email.email' => "The email field is is in valid email address",
    //     //     'password.required' => "The password field is required.",
    //     //     'password.min' => "The password field comatain min 8 letter."
    //     // ];
    // }

    protected function failedValidation(Validator $validator)
    {
        return $validator->errors();
    }
}
