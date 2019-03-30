<?php

namespace App\Listeners;

use App\Events\IssueAssigned;
use App\Events\OrderAdded;
use App\Order;

class AddPurchasedIssueToOrders
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
     * @param IssueAssigned $event
     * @return void
     */
    public function handle(IssueAssigned $event)
    {
        $order = Order::create([
            'user_id' => $event->user->id,
            'language' => $event->issue->language,
            'issues' => [$event->issue->issue],
            'status' => 'successful',
            'total' => $event->issue->price
        ]);

        // Trigger events
        event(new OrderAdded($event->user, $order));
    }
}
