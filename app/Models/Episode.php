<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Episode extends Model
{
    use HasFactory;

    // protected $table = 'Courses';

    protected $fillable = [
        'title',
        'course_id',
        'summary',
        'cover',
        'image',
        'video',
        'privacy'
    ];

    public function Course() : Object {
        return $this->belongsTo(Course::class);
    }
}
