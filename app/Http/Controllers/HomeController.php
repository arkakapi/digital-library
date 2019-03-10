<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::check())
            $issue->is_purchased = app('App\Http\Controllers\Auth\IssueController')->check($issue);

        return view('pages.issue', [
            'title' => $issue->title,
            'issue' => $issue
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
