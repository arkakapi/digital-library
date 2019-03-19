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
        $purchases = $user->{'purchases_' . $issue->language};

        if (!$issue->is_purchased)
            $purchases[] = $issue->id;

        asort($purchases);

        $user->{'purchases_' . $issue->language} = array_values($purchases);
        $user->save();
    }

}
