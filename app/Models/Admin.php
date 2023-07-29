<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    protected $guard = 'admin';


    protected $hidden = [
        'password', 'remember_token',
      ];

    public function setPasswordAttribute($value) : Void {
        $this->attributes['password'] = bcrypt($value);
    }
}
