<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->method() == 'PATCH') {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email,'. $this->user->id,
                'phone' => 'required|unique:admins,phone,'. $this->user->id,
                'password' => 'confirmed',
                'address' => 'nullable',
                'dob' => 'required',
                'gender' => 'required',
                'profile' => 'nullable', // required
                'remember_token' => 'nullable',
                'email_verified_at' => 'nullable'
            ];
        } else {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email',
                'phone' => 'required|unique:admins,phone',
                'password' => 'required|confirmed|min:8',
                'address' => 'nullable',
                'dob' => 'required',
                'gender' => 'required',
                'profile' => 'nullable', // required
                'remember_token' => 'nullable',
                'email_verified_at' => 'nullable'
            ];
        }
    }

    public function messages ()
    {
        return [
            'dob.required' => 'The Date of Birth field is required'
        ];
    }
}
