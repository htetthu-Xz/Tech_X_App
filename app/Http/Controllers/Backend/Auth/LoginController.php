<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Models\Admin;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index() : View 
    {
        return view('backend.auth.admin.login');    
    }

    public function login(Request $request) : RedirectResponse {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $remember = isset($request->remember) && $request->remember == 'on'? true : false ;

        $admin = Admin::where('email', $attributes['email'])->first();

        if(is_null($admin)) {
            return redirect()
                    ->route('get.login')
                    ->withErrors(['msg' => 'Your credentials does not match our record!']);
        }
        if(Auth::guard('admin')->attempt($attributes, $remember)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['msg' => 'Invalid Credentials']);
    }

    public function logout() : RedirectResponse {
        Auth::guard('admin')->logout();

        return redirect()->route('get.login');
    }

}
