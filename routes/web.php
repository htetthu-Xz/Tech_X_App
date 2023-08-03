<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CoursesController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\InstructorController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\RoleController;

Route::group([
    'prefix' => 'admin',
    'middleware' => 'web'
], function () {

    #auth -> login
    Route::get('login', [LoginController::class, 'index'])->name('get.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');


    #auth->forgot-password
    Route::get('forgot-password', [ForgotPasswordController::class, 'getForgotForm'])->name('admin.getForgot');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('admin.sendResetLink');

    #auth->reset-password
    Route::get('reset-password', [ResetPasswordController::class, 'resetVerify'])->name('admin.resetVerily');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('admin.resetPassword');

});

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'
], function() {

    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin.dashboard');
    
    #Admin CRUD
    Route::resource('admins', AdminController::class);

    #Instructor CRUD
    Route::resource('instructors', InstructorController::class);

    #User CRUD
    Route::resource('users', UserController::class);

    #Category CRUD
    Route::resource('categories', CategoryController::class);

    #Courses CRUD
    Route::resource('courses', CoursesController::class);

    #Role
    Route::resource('roles', RoleController::class);

    #logout
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
});
