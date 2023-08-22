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
        return [
            'title' => 'required',
            'course_id' => 'nullable',
            'summary' => 'required',
            'privacy' => 'nullable',
            'cover' => 'nullable',  //'required'
            'image' => 'nullable',  //'required',
            'video' => 'nullable',  //'required'
        ];
    }
}
