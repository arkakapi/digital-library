<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class PackageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
        $this->middleware('is_banned');
    }

    /**
     * Buy package page.
     *
     * @param  string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buyForm($slug)
    {
        return 'package buy form';
    }

}
