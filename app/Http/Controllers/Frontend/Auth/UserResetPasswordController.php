<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendUserResetPasswordSuccessEmail;

class UserResetPasswordController extends Controller
{
    public function resetVerify(Request $request) 
    {
        if(!$request->hasValidSignature()) {
            return redirect()
                        ->route('user.getForgot')
                        ->with(['expired' => 404]);
        }
        $user = User::find($request->user_id);

        if(is_null($user)) {
            return redirect()
                ->route('user.getForgot')
                ->withErrors('Your email address not found');
        }

        session(['reset_id' => $user->id]);

        return view('frontend.auth.forgot_password.reset_password');
    }

    public function reset(Request $request) 
    {
        $attributes = $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::findOrFail(session('reset_id'));

        $user->update(['password' => $attributes['password']]);

        session()->forget('reset_id');

        SendUserResetPasswordSuccessEmail::dispatch($user);

        return redirect()->route('user.get.login')->with(['reset_success' => 200]);
    }
}
