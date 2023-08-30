<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
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
                'title' => 'required',
                'instructor_id' => 'required',
                'description' => 'required',
                'category_id' => 'required|array',
                'summary' => 'required',
                'price' => 'numeric|required',
                'cover_photo' => 'nullable|mimes:jpeg,png,jpg|max:3500',
                'image' => 'nullable|mimes:jpeg,png,jpg|max:5000'
            ];
        } else {
            return [
                'title' => 'required',
                'instructor_id' => 'required',
                'description' => 'required',
                'category_id' => 'required|array',
                'summary' => 'required',
                'price' => 'numeric|required',
                'cover_photo' => 'required|mimes:jpeg,png,jpg|max:3500',
                'image' => 'required|mimes:jpeg,png,jpg|max:5000'
            ];
        }

    }
}
