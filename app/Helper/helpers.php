<?php

if(!function_exists('checkPermission')) {
    function checkPermission($permission, $guard = 'admin') {
        return auth()->guard($guard)->user()->hasPermissionTo($permission);
    }
}