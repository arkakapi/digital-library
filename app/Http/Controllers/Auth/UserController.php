<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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
     * Show the profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('auth.profile', [
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
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        if (!$request->input('password'))
            unset($data['password']);

        Auth::user()->fill($data)->save();

        Session::flash('class', 'success');
        Session::flash('message', 'Your profile has been successfully updated.');

        return redirect()->route('profile');
    }

    /**
     * My purchases page.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function myPurchases(Request $request)
    {
        return 'my purchases page';
    }

    /**
     * Show payment form for subscription.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subscribe(Request $request)
    {
        return 'subscription page';
    }


}
