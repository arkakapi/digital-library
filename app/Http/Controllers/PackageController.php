<?php

namespace App\Http\Controllers;

use App\Package;

class PackageController extends Controller
{
    /**
     * Show the all packages page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('package.index', [
            'title' => __('Packages'),
            'packages' => Package::all()
        ]);
    }

    /**
     * #StayHome for Corona Virus
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function stayHome()
    {
        return view('package.stay-home', [
            'title' => __('#StayHome'),
            'packages' => Package::all()
        ]);
    }
}
