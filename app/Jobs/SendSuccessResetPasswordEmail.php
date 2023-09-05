<?php

namespace App\Jobs;

use App\Mail\SuccessPasswordResetMail;
use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSuccessResetPasswordEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function handle(Mailer $mailer)
    {
        $mailer
            ->to($this->admin->email, $this->admin->name)
            ->send(new SuccessPasswordResetMail($this->admin));
    }
}
