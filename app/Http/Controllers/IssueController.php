<?php

namespace App\Http\Controllers;

use App\Issue;

class IssueController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the all issues page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('issue.index', [
            'title' => __('All Issues'),
            'issues' => Issue::orderBy('language', app()->getLocale() == 'tr' ? 'desc' : 'asc')
                ->orderBy('issue', 'desc')
                ->get()
        ]);
    }

    /**
     * Issue detail page.
     *
     * @param  string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($slug)
    {
        $issue = Issue::where('slug', $slug)->firstOrFail();

        return view('issue.show', [
            'title' => $issue->title,
            'issue' => $issue
        ]);
    }

}
