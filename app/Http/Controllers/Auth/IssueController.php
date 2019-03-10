<?php

namespace App\Http\Controllers\Auth;

use App\Issue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
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

        // Is user already bought this issue.
        if ($this->check($issue))
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
        if (!$this->check($issue))
            abort(403);

        return response()->file(storage_path('app/' . $slug . '.pdf'));
    }

    /**
     * Check user-issue relation.
     *
     * @param  Issue $issue
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function check($issue)
    {
        $user = Auth::user();
        $purchases_tr = json_decode($user->purchases_tr, true);
        $purchases_en = json_decode($user->purchases_en, true);

        return $user->role == 'admin' ? true : in_array($issue->id, ${'purchases_' . $issue->language});
    }

}
