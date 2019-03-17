<?php

namespace App\Services;

use App\Issue;
use App\User;

class IssueService
{
    /**
     * Assign issue to user.
     *
     * @param  Issue $issue
     */
    public function assignIssueToUser(User $user, Issue $issue)
    {
        $purchases_tr = json_decode($user->purchases_tr, true);
        $purchases_en = json_decode($user->purchases_en, true);

        if (!$issue->is_purchased)
            ${'purchases_' . $issue->language}[] = $issue->id;

        $user->purchases_tr = json_encode($purchases_tr);
        $user->purchases_en = json_encode($purchases_en);
        $user->save();
    }
}
