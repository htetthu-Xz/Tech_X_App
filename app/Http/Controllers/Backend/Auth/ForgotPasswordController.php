<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendForgotPasswordEmail;
use Illuminate\Http\RedirectResponse;

class ForgotPasswordController extends Controller
{
    function getForgotForm() : View 
    {
        return view('backend.auth.admin.forgot_password');
    }

    function sendResetLink(Request $request) : RedirectResponse 
    {
        $attributes = $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $attributes['email'])->first();

        if(is_null($admin)) {
            return back()->withErrors(['email' => 'Email not found']);
        }

        SendForgotPasswordEmail::dispatch($admin);

        return back()->with('send_success', 'Reset password link successfully send.Please check your email to reset password!');
    }
}
