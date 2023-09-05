<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'unique:users,phone',
            'password' => 'required|confirmed|min:8',
            'address' => 'nullable',
            'dob' => 'nullable',
            'gender' => 'required',
            'profile' => 'nullable|mimes:jpeg,png,jpg|max:3500' 
        ];
    }
}
