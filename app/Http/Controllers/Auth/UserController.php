<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Issue;
use App\Package;
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
        return view('auth.my-purchases', [
            'title' => __('My Purchases'),
            'user' => Auth::user(),
            'packages' => Package::all()
        ]);
    }

}
