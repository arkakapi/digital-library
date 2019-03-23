<?php

namespace App\Listeners;

use App\Events\IssueAssigned;
use App\Order;
use Illuminate\Support\Facades\Auth;

class AddPurchaseToOrders
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
     * @param  IssueAssigned $event
     * @return void
     */
    public function handle(IssueAssigned $event)
    {
        Order::create([
            'user_id' => $event->user->id,
            'language' => $event->issue->language,
            'issues' => [$event->issue->issue],
            'total' => $event->issue->price
        ]);
    }
}
