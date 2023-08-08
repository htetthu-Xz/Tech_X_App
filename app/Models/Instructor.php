<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setPasswordAttribute($value) : Void {
        $this->attributes['password'] = bcrypt($value);
    }

    public function setLinkAttribute($value) : Void {
            $this->attributes['link'] = json_encode($value);
    }

}
