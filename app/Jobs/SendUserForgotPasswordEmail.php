<?php

namespace App\Jobs;

use App\Models\User;

use Illuminate\Bus\Queueable;
use App\Mail\UserForgotPasswordMail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendUserForgotPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(Mailer $mailer)
    {
        $mailer
            ->to($this->user->email, $this->user->name)
            ->send(new UserForgotPasswordMail($this->user));
    }
}
