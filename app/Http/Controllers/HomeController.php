<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'latest_issues' => Issue::orderBy('issue', 'desc')->get()->unique('language')
        ]);
    }

    public function issues()
    {
        return 'issues page';
    }

    public function issue($slug)
    {
        return 'issue detail page';
    }

}
