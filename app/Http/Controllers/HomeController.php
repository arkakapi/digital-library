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
        return view('pages.issues', [
            'title' => __('All Issues'),
            'issues' => Issue::all()
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
        $issue = Issue::where('slug', $slug)->firstOrFail();
        return view('pages.issue', [
            'title' => $issue->title,
            'issue' => $issue
        ]);
    }

}
