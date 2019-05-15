<?php

namespace App\Http\Controllers\Auth;

use App\Country;
use App\Order;
use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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
     * @return Redirect
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['nullable', 'string'],
            'job' => ['nullable', 'string'],
            'language' => ['required', 'string', 'regex:(tr|en)'],
            'country_id' => ['required', 'string', 'exists:countries,id'],
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myPurchases()
    {
        return view('auth.my-purchases', [
            'title' => __('My Purchases'),
            'user' => Auth::user(),
            'packages' => Package::all()
        ]);
    }

    /**
     * Order history.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function orderHistory()
    {
        return view('auth.order-history', [
            'title' => __('Order History'),
            'orders' => Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get()
        ]);
    }

}
