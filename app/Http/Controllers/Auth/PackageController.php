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
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buyForm($slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();

        // Temporary suspend purchases START
        if ($package->price > 0) {
            return __('Our temporary purchases have been suspended. Now you can only access our published issues for free.');
        }
        // Temporary suspend purchases END

        if (!$package->is_purchased)
            $order = $this->packageService->createOrder(Auth::user(), $package);

        // If user already bought this package, redirect my purchases page.
        if ($package->is_purchased) {
            Session::flash('class', 'success');
            Session::flash('message', __('The package has been successfully added to your account.'));

            return redirect()->route('my-purchases');
        }

        return view('pages.paytr_form', [
            'title' => $package->title . ' ' . __('Buy'),
            'token' => $this->packageService->getToken(Auth::user(), $package, $order)
        ]);
    }
}
