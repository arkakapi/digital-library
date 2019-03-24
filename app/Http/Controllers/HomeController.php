<?php

namespace App\Http\Controllers;

use App\Issue;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.home', [
            'latest_issues' => Issue::orderBy('issue', 'desc')->get()->unique('language')
        ]);
    }

    /**
     * Contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return view('pages.contact', [
            'title' => __('Contact')
        ]);
    }

}
