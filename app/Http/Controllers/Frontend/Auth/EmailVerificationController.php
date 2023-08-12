<?php

namespace App\Http\Controllers\Frontend\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Notifications\RegisterNotification;

class EmailVerificationController extends Controller
{
    public function verify(Request $request)
    {        
        try {
            if(!$request->hasValidSignature()) {
                return view('frontend.auth.verification.expired');
            }
    
            $user = User::findOrFail($request->id);
    
            if($user->hasVerifiedEmail()) {
                return redirect()->route('user.get.login');
            }
    
            $user->markEmailAsVerified();
    
            $this->destroyResendUserSession();
    
            return redirect()->route('user.get.login')->with(['verify_success' => 200]);
            
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->route('frontend.home')->with(['error' => 500]);
        }
    }

    public function resend()
    {
        try {
            $user = User::findOrFail(session('resend')['id']);

            $user->notify(new RegisterNotification());
    
            return redirect()->route('frontend.home')->with(['resend_success' => 200]);
        } catch (Exception $e) {
            Log::error($e);

            return redirect()->route('frontend.home')->with(['error' => 500]);
        }
    }









    private function destroyResendUserSession() : void 
    {
        session()->forget('resend');
    }
}
