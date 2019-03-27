<?php

namespace App\Http\Controllers\Admin;

use App\Issue;
use App\Notifications\IssuePublished;
use App\User;
use App\Http\Controllers\AdminController;
use Illuminate\Bus\Queueable;

class EmailController extends AdminController
{

    use Queueable;

    /**
     * Display email form.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        return view('admin.email', [
            'users' => User::get(['id', 'name', 'email']),
            'issues' => Issue::get(['id', 'title', 'language'])
        ]);
    }

    /**
     * Send email to user.
     *
     * @param integer $user_id
     * @param integer $issue_id
     *
     * @return void
     */
    public function send($user_id, $issue_id)
    {
        $user = User::findOrfail($user_id);
        $issue = Issue::findOrfail($issue_id);

        $user->notify((new IssuePublished($user, $issue))->locale($user->language));
    }

}
