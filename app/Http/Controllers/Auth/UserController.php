<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\IssueService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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
        $this->issueService = $issueService;
    }

    /**
     * Ban notice page.
     *
     * @return \Illuminate\Http\Response
     */
    public function banned()
    {
        return view('auth.banned');
    }

    /**
     * Show the profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('auth.profile', [
            'title' => __('Profile'),
            'user' => Auth::user(),
            'countries' => Country::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'country_id' => ['required', 'exists:countries,id'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
        ]);

        $data = [
            'name' => $request->input('name'),
            'job' => $request->input('job'),
            'language' => $request->input('language'),
            'country_id' => $request->input('country_id')
        ];

        if ($request->input('password'))
            $data['password'] = Hash::make($request->input('password'));

        Auth::user()->update($data);

        Session::flash('class', 'success');
        Session::flash('message', 'Your profile has been successfully updated.');

        return redirect()->route('profile');
    }

    /**
     * My purchases page.
     *
     * @return \Illuminate\Http\Response
     */
    public function myPurchases()
    {
        $user = Auth::user();
        $issues = Issue::orderBy('issue', 'asc')->get();
        $purchases_tr = json_decode($user->purchases_tr, true);
        $purchases_en = json_decode($user->purchases_en, true);

        $subscriptions = [
            [
                'language' => 'tr',
                'year' => 2018,
                'potential_issues' => [1, 2, 3, 4, 5, 6],
                'published_issues' => getPublishedIssuesByYear($issues, 'tr', 1, 7)
            ],
            [
                'language' => 'tr',
                'year' => 2019,
                'potential_issues' => [7, 8, 9, 10, 11, 12],
                'published_issues' => getPublishedIssuesByYear($issues, 'tr', 7, 13)
            ],
            [
                'language' => 'en',
                'year' => 2019,
                'potential_issues' => [1, 2, 3, 4, 5, 6],
                'published_issues' => getPublishedIssuesByYear($issues, 'en', 1, 7)
            ]
        ];

        return view('pages.my-purchases', [
            'title' => __('My Purchases'),
            'user' => $user,
            'issues' => $issues,
            'purchases_tr' => $purchases_tr,
            'purchases_en' => $purchases_en,
            'subscriptions' => $subscriptions
        ]);
    }

}
