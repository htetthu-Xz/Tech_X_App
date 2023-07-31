<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        if($this->method() == 'PATCH') {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email,'. $this->admin->id,
                'phone' => 'required|unique:admins,phone,'. $this->admin->id,
                'password' => 'confirmed',
                'address' => 'nullable',
                'dob' => 'required',
                'gender' => 'required',
                'profile' => 'nullable' // required
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
                'profile' => 'nullable' // required
            ];
        }

    }
}
