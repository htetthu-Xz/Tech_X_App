<?php

use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\InstructorController;


Route::prefix('/admin')->middleware('web')->group(function () {
    Route::get('/', function () {
        return view('backend.dashboard');
        // dd(auth()->guard('admin')->user());
    })->name('admin.dashboard');

    #Admin CRUD
    Route::get('accounts', [AdminController::class, 'index'])->name('admin.index');
    Route::get('accounts/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('accounts/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('accounts/{admin:id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('accounts/{admin:id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('accounts/{admin:id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    #Instructor CRUD
    Route::get('instructor', [InstructorController::class, 'index'])->name('instructor.index');
    Route::get('instructor/create', [InstructorController::class, 'create'])->name('instructor.create');
    Route::post('instructor/store', [InstructorController::class, 'store'])->name('instructor.store');
    Route::get('instructor/{instructor:id}/edit', [InstructorController::class, 'edit'])->name('instructor.edit');
    Route::patch('instructor/{instructor:id}', [InstructorController::class, 'update'])->name('instructor.update');
    Route::delete('instructor/{instructor:id}', [InstructorController::class, 'destroy'])->name('instructor.destroy');

    #User CRUD
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{user:id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('user/{user:id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{user:id}', [UserController::class, 'destroy'])->name('user.destroy');

    #Category CRUD
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/{category:id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('category/{category:id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{category:id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    #auth -> login
    Route::get('login', [LoginController::class, 'index'])->name('get.login');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
    #auth->forgot-password
    Route::get('forgot-password', [ForgotPasswordController::class, 'getForgotForm'])->name('admin.getForgot');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('admin.sendResetLink');
    #auth->reset-password
    Route::get('reset-password', [ResetPasswordController::class, 'resetVerify'])->name('admin.resetVerily');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('admin.resetPassword');

});
