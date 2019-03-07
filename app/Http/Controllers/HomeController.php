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
        return view('pages.home', [
            'latest_issues' => Issue::orderBy('issue', 'desc')->get()->unique('language')
        ]);
    }

    /**
     * Show the all issues page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function issues()
    {
        $issues = Issue::all();
        return view('pages.issues', [
            'issues' => $issues
        ]);
    }

    /**
     * Issue detail page.
     *
     * @param  string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function issue($slug)
    {
        return 'issue detail page';
    }

}
