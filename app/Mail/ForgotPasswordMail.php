<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function build()
    {
        $reset_password_link = URL::temporarySignedRoute(
                'admin.resetVerily', 
                Carbon::now()->addMinutes(5), 
                ['admin_id' => $this->admin->id]);
                
        return $this->subject('Reset Password From Tech X')
                ->from('noreply@texhX.com')
                ->view('backend.auth.admin.email.forgot_password', [
                    'admin' => $this->admin,
                    'reset_password_link' => $reset_password_link
                ]);
    }
}
