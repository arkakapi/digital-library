<?php

namespace App\Events;

use App\Package;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class PackageAssigned
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
     * @var Package
     */
    public $package;

    /**
     * Create a new event instance.
     *
     * @param $user
     * @param $package
     *
     * @return void
     */
    public function __construct($user, $package)
    {
        $this->user = $user;
        $this->package = $package;
    }

}
