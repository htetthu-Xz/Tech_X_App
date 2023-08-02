<?php

namespace App\Models;


use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'profile',
        'address',
        'gender',
        'dob'
    ];

    protected $guard = 'admin';


    protected $hidden = [
        'password', 'remember_token',
      ];

    public function setPasswordAttribute($value) : Void {
        $this->attributes['password'] = bcrypt($value);
    }
}
