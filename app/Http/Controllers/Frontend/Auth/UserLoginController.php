<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function index() : View 
    {
        return view('frontend.auth.login');    
    }

    public function login(Request $request)
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $remember = isset($request->remember) && $request->remember == 'on'? true : false ;

        $user = User::where('email', $attributes['email'])->first();

        if(is_null($user)) {
            return redirect()
                    ->route('user.get.login')
                    ->withErrors(['msg' => 'Your credentials does not match our record!']);
        }

        if(!$user->hasVerifiedEmail()) {
            return back()->with(['err' => 'Not Verify']);
        }

        if(Auth::attempt($attributes, $remember)) {
            return redirect()->route('frontend.home');
        }

        return back()->withErrors(['msg' => 'Invalid Credentials']);
    }

    public function logout() : RedirectResponse 
    {
        Auth::logout();

        return redirect()->route('user.get.login');
    }
}
