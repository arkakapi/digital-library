<?php

namespace App\Http\Controllers\Auth;

use App\Issue;
use App\Http\Controllers\Controller;
use App\User;
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
        $this->middleware('is_banned');
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
            $this->assignIssueToUser($issue);

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

        return $user->is_admin ?: in_array($issue->id, ${'purchases_' . $issue->language});
    }

    /**
     * Assign issue to user.
     *
     * @param  Issue $issue
     */
    private function assignIssueToUser($issue)
    {
        $user = Auth::user();
        $purchases_tr = json_decode($user->purchases_tr, true);
        $purchases_en = json_decode($user->purchases_en, true);

        if (!$this->check($issue))
            ${'purchases_' . $issue->language}[] = $issue->id;

        $user->purchases_tr = json_encode($purchases_tr);
        $user->purchases_en = json_encode($purchases_en);
        $user->save();
    }

}
