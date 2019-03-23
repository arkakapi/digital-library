<?php

namespace App\Events;

use App\Issue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class IssueAssigned
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * Assigned Issue.
     *
     * @var Issue
     */
    public $issue;

    /**
     * Create a new event instance.
     *
     * @param $user
     * @param $issue
     *
     * @return void
     */
    public function __construct($user, $issue)
    {
        $this->user = $user;
        $this->issue = $issue;
    }

}
