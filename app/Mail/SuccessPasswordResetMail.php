<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuccessPasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function build()
    {
                
        return $this->subject('Your Tech X Admin Account was recovered successfully')
                ->from('noreply@texhX.com')
                ->view('backend.auth.admin.email.success_reset_password', [
                    'admin' => $this->admin
                ]);
    }
}
