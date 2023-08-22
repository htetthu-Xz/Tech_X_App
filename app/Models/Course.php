<?php

namespace App\Models;

use App\Models\Episode;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Instructor() : Object
    {
        return $this->belongsTo(Instructor::class);
    }

    public function Category() : Object
    {
        return $this->belongsToMany(Category::class);
    }

    public function Episode() : Object {
        return $this->hasMany(Episode::class);
    }
}
