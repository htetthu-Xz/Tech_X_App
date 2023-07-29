<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendSuccessResetPasswordEmail;
use Illuminate\Http\RedirectResponse;


class ResetPasswordController extends Controller
{
    public function resetVerify(Request $request) 
    {
        if(!$request->hasValidSignature()) {
            return redirect()
                        ->route('admin.getForgot')
                        ->withErrors('Invalid Reset password link or link is Expired! ');
        }
        $admin = Admin::find($request->admin_id);

        if(is_null($admin)) {
            return redirect()
                ->route('admin.getForgot')
                ->withErrors('Your email address not found');
        }

        session(['reset_id' => $admin->id]);

        return view('backend.auth.admin.reset_password');
    }

    public function reset(Request $request) 
    {
        $attributes = $request->validate([
            'password' => 'required|confirmed|min:8'
        ]);

        $admin = Admin::findOrFail(session('reset_id'));

        $admin->update(['password' => $attributes['password']]);

        session()->forget('reset_id');

        SendSuccessResetPasswordEmail::dispatch($admin);

        return redirect()->route('get.login')->with('reset_success', 'Your password successfully change. Please login!');
    }
}
