<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendUserForgotPasswordEmail;

class UserForgotPasswordController extends Controller
{
    public function getForgotForm() : View
    {
        return view('frontend.auth.forgot_password.index');
    }

    public function sendResetLink(Request $request) 
    {
        $email = $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $email['email'])->first();

        if(is_null($user)) {
            return back()->withErrors(['msg' => 'Email not Found!']);
        }

        SendUserForgotPasswordEmail::dispatch($user);

        return back()->with(['success_reset_link' => 200]);
    }
}
