<?php

namespace App\Listeners;

use App\Events\PackageAssigned;
use App\Events\OrderAdded;
use App\Order;

class AddPurchasedPackageToOrders
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
     * @param PackageAssigned $event
     * @return void
     */
    public function handle(PackageAssigned $event)
    {
        $order = Order::create([
            'user_id' => $event->user->id,
            'language' => $event->package->language,
            'issues' => $event->package->issues,
            'status' => 'successful',
            'total' => $event->package->price
        ]);

        // Trigger events
        event(new OrderAdded($event->user, $order));
    }
}
