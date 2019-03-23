<?php

namespace App\Providers;

use App\Events\IssueAssigned;
use App\Events\PackageAssigned;
use App\Events\UserAdded;
use App\Listeners\AddPurchasedIssueToOrders;
use App\Listeners\AddPurchasedPackageToOrders;
use App\Listeners\SendWelcomeEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class
        ],
        UserAdded::class => [
            SendWelcomeEmail::class
        ],
        IssueAssigned::class => [
            AddPurchasedIssueToOrders::class
        ],
        PackageAssigned::class => [
            AddPurchasedPackageToOrders::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
