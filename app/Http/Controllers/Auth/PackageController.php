<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Package;
use App\Services\PackageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{

    protected $packageService;

    /**
     * Create a new controller instance.
     *
     * @param PackageService $packageService
     *
     * @return void
     */
    public function __construct(PackageService $packageService)
    {
        $this->middleware('verified');
        $this->middleware('is_banned');

        $this->packageService = $packageService;
    }

    /**
     * Buy package page.
     *
     * @param  string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buyForm($slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();

        // If package is free, auto buy.
        if ($package->price == 0) {
            $this->packageService->assignPackageToUser(Auth::user(), $package);

            Session::flash('class', 'success');
            Session::flash('message', __('The package has been successfully added to your account.'));

            return redirect()->route('my-purchases');
        }

        return view('package.buy', [
            'title' => $package->title . ' ' . __('Buy'),
            'package' => $package
        ]);
    }

}
