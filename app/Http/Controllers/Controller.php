<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getAuthUser($guard_name = 'admin') 
    {
        return Auth::guard($guard_name)->user();
    }

    public function checkRolePermission($permission, $guard_name = 'admin') {
        abort_if(!$this->getAuthUser($guard_name)->hasPermissionTo($permission), 403);
    }
}
