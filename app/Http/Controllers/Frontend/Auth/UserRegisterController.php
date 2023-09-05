<?php

namespace App\Http\Controllers\Frontend\Auth;

use Exception;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserRegisterRequest;
use App\Notifications\RegisterNotification;

class UserRegisterController extends Controller
{
    public function index () : View 
    {
        return view('frontend.auth.register');
    }

    public function store(UserRegisterRequest $request) : RedirectResponse 
    {

        try {
            $attributes = $request->validated();

            $attributes['profile'] = $this->setFile($request, 'profile', 'public/images/profile/');

            $user = User::create($attributes);

            $user->notify(new RegisterNotification());
        
            $this->setResend($user);
    
            return redirect()->route('frontend.home')->with(['register_success' => 200]);
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->route('frontend.home')->with(['error' => 500]);
        }
    }

    private function setResend($user) : void 
    {
        session(['resend' => ['id' => $user->id]]);
    }
}
