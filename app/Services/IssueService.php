<?php

namespace App\Services;

use App\Issue;
use App\User;

class IssueService
{
    /**
     * Assign issue to user.
     *
     * @param  User $user
     * @param  Issue $issue
     */
    public function assignIssueToUser(User $user, Issue $issue)
    {
        $purchases = json_decode($user->{'purchases_' . $issue->language}, true);

        if (!$issue->is_purchased)
            $purchases[] = $issue->id;

        asort($purchases);

        $user->{'purchases_' . $issue->language} = json_encode($purchases);
        $user->save();
    }
}
