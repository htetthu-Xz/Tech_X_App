<?php

namespace App\Notifications;

use Carbon\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisterNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $verify_url = URL::temporarySignedRoute('verification.verify', Carbon::now()->addMinutes(5), ['id' => $notifiable->id]);

        return (new MailMessage)
            ->view('frontend.auth.email.verification', ['verification_link' => $verify_url, 'user' => $notifiable])
            ->subject('Email Verification from Tech X App');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
