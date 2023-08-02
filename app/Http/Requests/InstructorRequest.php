<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstructorRequest extends FormRequest
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
                'email' => 'required|email|unique:admins,email,'. $this->instructor->id,
                'phone' => 'required|unique:admins,phone,'. $this->instructor->id,
                'password' => 'confirmed',
                'address' => 'nullable',
                'dob' => 'required',
                'gender' => 'required',
                'bio' => 'required',
                'profile' => 'nullable', // required
                'link.*.icon' => 'required',
                'link.*.link' => 'required',
                'link.*.label' => 'required'
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
                'bio' => 'required',
                'profile' => 'nullable', // required
                'link.*.icon' => 'required',
                'link.*.link' => 'required',
                'link.*.label' => 'required'
            ];
        }
    }

    public function messages () 
    {
        return [
            'link.*.icon.required' => 'The link icon field is required!',
            'link.*.link.required' => 'The link link field is required!',
            'link.*.label.required' => 'The link label field is required!',
            'dob.required' => 'The Date of Birth field is required'
        ];
    }
}
