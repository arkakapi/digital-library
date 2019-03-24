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

}
