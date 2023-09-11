<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CoursesController;
use App\Http\Controllers\Backend\EpisodeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\InstructorController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\CoursePageController;
use App\Http\Controllers\Frontend\ContactPageController;
use App\Http\Controllers\Frontend\EpisodePageController;
use App\Http\Controllers\Frontend\Auth\UserLoginController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\Auth\UserRegisterController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Frontend\Auth\EmailVerificationController;
use App\Http\Controllers\Frontend\Auth\UserResetPasswordController;
use App\Http\Controllers\Frontend\Auth\UserForgotPasswordController;

Route::group([
    'prefix' => 'admin',
    'middleware' => 'guest:admin'
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
    'middleware' => 'auth:admin'
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

    #Episode CRUD
    Route::resource('courses/{course}/episodes', EpisodeController::class);

    #Role
    Route::resource('roles', RoleController::class);

    #logout
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
});

//---------------------------- frontend --------------------------------//

Route::group([
    'middleware' => 'guest-user'
], function () {
    #Login
    Route::get('login', [UserLoginController::class, 'index'])->name('user.get.login');
    Route::post('login', [UserLoginController::class, 'login'])->name('user.login');

    #Register
    Route::get('register', [UserRegisterController::class, 'index'])->name('user.get.register');
    Route::post('register', [UserRegisterController::class, 'store'])->name('user.store');

    #Email Verification
    Route::prefix('email/verify')->group(function() {
        Route::get('/', [EmailVerificationController::class, 'verify'])->name('verification.verify');
        Route::get('resend', [EmailVerificationController::class, 'resend'])->name('verification.resend');
    });

    #forgot-password
    Route::get('forgot-password', [UserForgotPasswordController::class, 'getForgotForm'])->name('user.getForgot');
    Route::post('forgot-password', [UserForgotPasswordController::class, 'sendResetLink'])->name('user.sendResetLink');

    #reset-password
    Route::get('reset-password', [UserResetPasswordController::class, 'resetVerify'])->name('user.resetVerily');
    Route::post('reset-password', [UserResetPasswordController::class, 'reset'])->name('user.resetPassword');
});

#Home
Route::get('/home', [HomePageController::class, 'index'])->name('frontend.home');
Route::get('/load', [HomePageController::class, 'load'])->name('frontend.category.load');

#Course 
Route::get('courses', [CoursePageController::class, 'index'])->name('frontend.courses.index');
Route::get('course', [CoursePageController::class, 'loadMore'])->name('frontend.courses.load');
Route::get('course/search', [CoursePageController::class, 'search'])->name('frontend.courses.search');
Route::get('course/category-search', [CoursePageController::class, 'categorySearch'])->name('frontend.courses.category.search');
Route::get('courses/{course:slug}', [CoursePageController::class, 'show'])->name('frontend.courses.detail');
Route::get('courses/{course:slug}/episodes/{episode}', [EpisodePageController::class, 'showEpisode'])->name('frontend.courses.episode');
Route::get('courses/{course:slug}/episodes', [EpisodePageController::class, 'getVideo'])->name('frontend.courses.episodes.video');

#About
Route::get('about', [AboutPageController::class, 'index'])->name('frontend.about');

#contact us
Route::get('contact', [ContactPageController::class, 'index'])->name('frontend.contact');

Route::group([
    'middleware' => 'auth'
], function ()  {

    #logout
    Route::get('logout', [UserLoginController::class, 'logout'])->name('user.logout');

});
