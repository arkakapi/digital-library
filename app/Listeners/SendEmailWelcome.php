<?php

namespace App\Listeners;

use App\Events\UserAdded;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class SendEmailWelcome
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserAdded $event
     * @return void
     */
    public function handle(UserAdded $event)
    {
        Password::sendResetLink(['email' => $event->user->email], function (Message $message) {
            $message->subject($this->getEmailSubject());
        });
    }
}
