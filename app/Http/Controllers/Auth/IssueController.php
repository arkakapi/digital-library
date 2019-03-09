<?php

namespace App\Http\Controllers\Auth;

use App\Issue;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    private function check($issue)
    {
        $user = Auth::user();
        $purchases_tr = json_decode($user->purchases_tr, true);
        $purchases_en = json_decode($user->purchases_en, true);

        return in_array($issue->id, ${'purchases_' . $issue->language});
    }

}
