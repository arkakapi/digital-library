<?php

namespace App\Services;

use App\Events\IssueAssigned;
use App\Helper\PayTR;
use App\Issue;
use App\Order;
use Illuminate\Contracts\Auth\Authenticatable;

class IssueService
{
    /**
     * Assign issue to user.
     *
     * @param Authenticatable $user
     * @param Issue $issue
     */
    public function assignIssueToUser(Authenticatable $user, Issue $issue)
    {
        if (!$issue->is_purchased) {

            $purchases = $user->{'purchases_' . $issue->language};

            $purchases[] = $issue->issue;

            asort($purchases);

            $user->{'purchases_' . $issue->language} = array_values($purchases);
            $user->save();

            // Trigger events
            event(new IssueAssigned($user, $issue));
        }
    }

    /**
     * Get PayTR token for payment form.
     *
     * @param Authenticatable $user
     * @param Issue $issue
     *
     * @return string
     */
    public function getToken(Authenticatable $user, Issue $issue)
    {
        $order = Order::create([
            'user_id' => $user->id,
            'language' => $issue->language,
            'issues' => [$issue->issue],
            'status' => 'pending',
            'total' => $issue->price
        ]);

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
