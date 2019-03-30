<?php

namespace App\Services;

use App\Events\OrderAdded;
use App\Helper\PayTR;
use App\Issue;
use App\Order;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class IssueService
{
    /**
     * Assign issue to user.
     *
     * @param Authenticatable $user
     * @param Issue $issue
     * @param Order $order
     */
    public function assignIssueToUser(Authenticatable $user, Issue $issue, Order $order)
    {
        if (!$issue->is_purchased) {

            // assign issue
            $purchases = $user->{'purchases_' . $issue->language};

            $purchases[] = $issue->issue;

            asort($purchases);

            $user->{'purchases_' . $issue->language} = array_values($purchases);
            $user->save();

            // Trigger events
            event(new OrderAdded($user, $order));
        }
    }

    public function buy(Authenticatable $user, Issue $issue)
    {
        // create order
        $order = Order::create([
            'user_id' => $user->id,
            'language' => $issue->language,
            'issues' => [$issue->issue],
            'status' => 'pending',
            'total' => $issue->price
        ]);

        // If issue is free, auto buy.
        if ($issue->price == 0) {
            $this->assignIssueToUser(Auth::user(), $issue, $order);
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
     * @param Issue $issue
     * @param Order $order
     *
     * @return string
     */
    public function getToken(Authenticatable $user, Issue $issue, Order $order)
    {
        return (new PayTR($this))->getToken(
            $order,
            $issue->price * 100,
            $issue->language == 'tr' ? 'TL' : 'USD',
            $user->email,
            !empty($user->name) ? $user->name : $user->email,
            $user->email,
            $user->email,
            [
                [
                    $issue->title,
                    $issue->price,
                    1
                ]
            ]
        );
    }

}
