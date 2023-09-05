<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->method() == 'PATCH') {
            return [
                'title' => 'required',
                'course_id' => 'nullable',
                'summary' => 'required',
                'privacy' => 'nullable',
                'cover' => 'nullable|mimes:jpeg,png,jpg|max:5000',
                'image' => 'nullable|mimes:jpeg,png,jpg|max:5000',
                'video' => 'nullable|mimes:mp4',
            ];
        } else {
            return [
                'title' => 'required',
                'course_id' => 'nullable',
                'summary' => 'required',
                'privacy' => 'nullable',
                'cover' => 'required|mimes:jpeg,png,jpg|max:5000',
                'image' => 'required|mimes:jpeg,png,jpg|max:5000',
                'video' => 'required|mimes:mp4',
            ];
        }   
    }
}
