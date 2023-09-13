<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class UserLoginController extends Controller
{
    public function index() : View 
    {
        return view('frontend.auth.login');    
    }

    public function login(Request $request) : RedirectResponse
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

    public function githubLogin() 
    {   
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback(Request $request) 
    {
        if($request->error) {
            return redirect()->route('user.get.login');
        }
        $user = Socialite::driver('github')->user();
        
        $user = User::firstOrCreate([

            'email' => $user->getEmail()
        ], [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => $user->getName(),
            'phone' => '',
            'dob' => Carbon::now()->format('Y-m-d'),
            'gender' => '',
            'profile' => null
        ]);

        Auth::login($user);

        return redirect()->route('frontend.home');
    }
}
