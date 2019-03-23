<?php

namespace App\Listeners;

use App\Events\OrderAdded;
use App\Notifications\Purchased;

class SendPurchasedEmail
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
     * @param  OrderAdded $event
     * @return void
     */
    public function handle(OrderAdded $event)
    {
        $event->user->notify(new Purchased($event->user, $event->order));
    }
}
