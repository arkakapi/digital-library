<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Services\IssueService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    protected $issueService;

    /**
     * Create a new controller instance.
     *
     * @param IssueService $issueService
     *
     * @return void
     */
    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
    }

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
