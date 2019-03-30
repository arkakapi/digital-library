<?php

namespace App\Listeners;

use App\Log;
use Illuminate\Auth\Events\Login;
use Molayli\CloudflareRealIpServiceProvider;

class CreateUserLoginLog
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
     * @param Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        Log::create([
            'user_id' => $event->user->id,
            'action' => 'login',
            'ip_address' => CloudflareRealIpServiceProvider::ip()
        ]);
    }
}
