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
Route::get('/banned', 'Auth\UserController@banned')->name('banned');

// Public Pages
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');

// Profile
Route::get('/profile', 'Auth\UserController@profile')->name('profile');
Route::post('/profile', 'Auth\UserController@update');

// Issues
Route::get('/issues', 'HomeController@issues')->name('issues.index');
Route::get('/issues/{issue}', 'HomeController@issue')->name('issues.show');
Route::get('/issues/{issue}/buy', 'Auth\IssueController@buyForm')->name('issues.buy');
Route::get('/issues/{issue}/read', 'Auth\IssueController@read')->name('issues.read');
Route::get('/issues/{issue}/pdf', 'Auth\IssueController@pdf')->name('issues.pdf');

// My Purchases
Route::get('/my-purchases', 'Auth\UserController@myPurchases')->name('my-purchases');

// Subscribe
Route::get('/subscribe', 'Auth\IssueController@subscribeForm')->name('subscribe');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');

    // Users
    Route::resource('/users', 'Admin\UserController')->except([
        'show', 'destroy'
    ]);

    // Issues
    Route::resource('/issues', 'Admin\IssueController')->except([
        'show', 'destroy'
    ]);

});
