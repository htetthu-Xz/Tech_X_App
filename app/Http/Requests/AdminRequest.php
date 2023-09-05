<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
                'email' => 'required|email|unique:admins,email,'. $this->admin->id,
                'phone' => 'required|unique:admins,phone,'. $this->admin->id,
                'password' => 'confirmed',
                'address' => 'nullable',
                'dob' => 'required',
                'gender' => 'required',
                'profile' => 'nullable|mimes:jpeg,png,jpg|max:3500'
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
                'profile' => 'nullable|mimes:jpeg,png,jpg|max:3500'
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
