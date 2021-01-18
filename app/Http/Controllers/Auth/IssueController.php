<?php

namespace App\Http\Controllers\Auth;

use App\Issue;
use App\Http\Controllers\Controller;
use App\Services\IssueService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
     * Buy issue page.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function buyForm($slug)
    {
        $issue = Issue::where('slug', $slug)->firstOrFail();

        if (!$issue->is_purchased)
            $order = $this->issueService->createOrder(Auth::user(), $issue);

        // If user already bought this issue, redirect my purchases page.
        if ($issue->is_purchased) {
            Session::flash('class', 'success');
            Session::flash('message', __('The issue has been successfully added to your account.'));

            return redirect()->route('my-purchases');
        }

        return view('pages.paytr_form', [
            'title' => $issue->title . ' ' . __('Buy'),
            'token' => $this->issueService->getToken(Auth::user(), $issue, $order)
        ]);
    }

    /**
     * Read issue page.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function read($slug)
    {
        $issue = Issue::where('slug', $slug)->firstOrFail();
        return view('issue.read', [
            'title' => $issue->title,
            'issue' => $issue
        ]);
    }

    /**
     * Get issue PDF.
     *
     * @param string $slug
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
