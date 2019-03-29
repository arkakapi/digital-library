<?php

namespace App\Services;

use App\Events\IssueAssigned;
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

}
