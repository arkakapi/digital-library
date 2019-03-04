<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth routes
Auth::routes(['verify' => true]);

// Homepage
Route::get('/', 'HomeController@index')->name('home');

// Profile
Route::get('/profile', 'Auth\UserController@profile')->name('profile');
Route::post('/profile', 'Auth\UserController@update');

// My Purchases
Route::get('/my-purchases', 'Auth\UserController@myPurchases')->name('my-purchases');

// Subscribe
Route::get('/subscribe', 'Auth\UserController@subscribe')->name('subscribe');
