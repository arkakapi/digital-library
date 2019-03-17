<?php

namespace App\Http\Controllers\Auth;

use App\Issue;
use App\User;
use App\Http\Controllers\Controller;
use App\Services\IssueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
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
        $this->middleware('verified');
        $this->middleware('is_banned');
        $this->issueService = $issueService;
    }

    /**
     * Show payment form for subscription.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subscribeForm(Request $request)
    {
        return 'subscription page';
    }

    /**
     * Buy issue page.
     *
     * @param  string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buyForm($slug)
    {
        $issue = Issue::where('slug', $slug)->firstOrFail();

        // If issue is free, auto buy.
        if ($issue->price == 0)
            $this->issueService->assignIssueToUser(Auth::user(), $issue);

        // Is user already bought this issue.
        if ($issue->is_purchased)
            return redirect()->route('issues.read', $slug);

        return view('pages.issue-buy', [
            'title' => $issue->title . ' ' . __('Buy'),
            'issue' => $issue
        ]);
    }

    /**
     * Read issue page.
     *
     * @param  string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function read($slug)
    {
        $issue = Issue::where('slug', $slug)->firstOrFail();
        return view('pages.issue-read', [
            'title' => $issue->title,
            'issue' => $issue
        ]);
    }

    /**
     * Get issue PDF.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function pdf($slug)
    {
        $issue = Issue::where('slug', $slug)->firstOrFail();

        // If user not have access this to issue
        if (!Auth::user()->is_admin && !$issue->is_purchased)
            abort(403);

        return response()->file(storage_path('app/' . $slug . '.pdf'));
    }

}
