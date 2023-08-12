<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $reset_password_link = URL::temporarySignedRoute(
            'user.resetVerily', 
            Carbon::now()->addMinutes(5), 
            ['user_id' => $this->user->id]);

        return $this->subject('Reset Password From Tech X')
            ->from('noreply@texhX.com')
            ->view('frontend.auth.email.forgot_password', [
                'user' => $this->user,
                'reset_password_link' => $reset_password_link
            ]);
    }
}
