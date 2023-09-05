<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Courses() 
    {
        return $this->belongsToMany(Courses::class);
    }

    public function setTitleAttribute($value) : Void {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($this->attributes['title']);
    }
}
