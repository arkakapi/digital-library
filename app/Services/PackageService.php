<?php

namespace App\Services;

use App\Events\OrderAdded;
use App\Helper\PayTR;
use App\Order;
use App\Package;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class PackageService
{
    /**
     * Assign package to user.
     *
     * @param Authenticatable $user
     * @param Package $package
     * @param Order $order
     */
    public function assignPackageToUser(Authenticatable $user, Package $package, Order $order)
    {
        $purchases = $user->{'purchases_' . $package->language};

        $purchases = array_unique(array_merge(
            $purchases,
            $package->issues
        ), SORT_NUMERIC);

        asort($purchases);

        $user->{'purchases_' . $package->language} = array_values($purchases);
        $user->save();

        // Trigger events
        event(new OrderAdded($user, $order));
    }

    /**
     * Create order and assign issue if issue is free.
     *
     * @param Authenticatable $user
     * @param Package $package
     *
     * @return Order $order
     */
    public function createOrder(Authenticatable $user, Package $package)
    {
        // create order
        $order = Order::create([
            'user_id' => $user->id,
            'language' => $package->language,
            'issues' => $package->issues,
            'status' => 'pending',
            'total' => $package->price
        ]);

        // If package is free, auto buy.
        if ($package->price == 0) {
            $this->assignPackageToUser(Auth::user(), $package, $order);
            $order->update([
                'status' => 'successful'
            ]);
        }

        return $order;
    }

    /**
     * Get PayTR token for payment form.
     *
     * @param Authenticatable $user
     * @param Package $package
     * @param Order $order
     *
     * @return string
     */
    public function getToken(Authenticatable $user, Package $package, Order $order)
    {
        return (new PayTR())->getToken(
            $order,
            $package->price * 100,
            $package->language == 'tr' ? 'TL' : 'USD',
            $user->email,
            !empty($user->name) ? $user->name : $user->email,
            $user->email,
            $user->email,
            [
                [
                    $package->title,
                    $package->price,
                    1
                ]
            ]
        );
    }
}
