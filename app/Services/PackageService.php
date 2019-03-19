<?php

namespace App\Services;

use App\Package;
use App\User;
use Illuminate\Support\Facades\Auth;

class PackageService
{

    protected $issueService;

    /**
     * Create a new controller instance.
     *
     * @param IssueService $issueService
     *
     * @return void
     */
    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
    }

    /**
     * Assign package to user.
     *
     * @param  User $user
     * @param  Package $package
     */
    public function assignPackageToUser(User $user, Package $package)
    {
        if (!$package->is_purchased) {

            $purchases = json_decode($user->{'purchases_' . $package->language}, true);

            $purchases = array_unique(array_merge(
                $purchases,
                json_decode($package->issues, true)
            ), SORT_NUMERIC);

            asort($purchases);
            $purchases = array_values($purchases);

            $user->{'purchases_' . $package->language} = json_encode($purchases);
            $user->save();
        }
    }
}
