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
Route::get('/issues', 'IssueController@index')->name('issues.index');
Route::get('/issues/{issue}', 'IssueController@show')->name('issues.show');
Route::get('/issues/{issue}/buy', 'Auth\IssueController@buyForm')->name('issues.buy');
Route::get('/issues/{issue}/read', 'Auth\IssueController@read')->name('issues.read');
Route::get('/issues/{issue}/pdf', 'Auth\IssueController@pdf')->name('issues.pdf');

// Packages
Route::get('/packages', 'PackageController@index')->name('packages.index');
Route::get('/packages/{package}/buy', 'Auth\PackageController@buyForm')->name('packages.buy');

// #StayHome for Corona Virus
Route::get('/stay-home', 'PackageController@stayHome')->name('packages.stayHome');

// My Purchases
Route::get('/my-purchases', 'Auth\UserController@myPurchases')->name('my-purchases');

// Order History
Route::get('/order-history', 'Auth\UserController@orderHistory')->name('order-history');

// Payment pages
Route::post('/paytr/callback', 'OrderController@paytrCallback')->name('paytr.callback');
Route::get('/paytr/error', 'OrderController@paytrErrorPage')->name('paytr.error_page');

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

    // Packages
    Route::resource('/packages', 'Admin\PackageController')->except([
        'show', 'destroy'
    ]);

    // Order History
    Route::get('/orders', 'Admin\OrderController@index')->name('orders.index');

    // User Logs
    Route::get('/logs', 'Admin\LogController@index')->name('logs.index');

    // Send email
    Route::get('/email', 'Admin\EmailController@form')->name('email.form');
    Route::get('/email/send/{user_id}/{issue_id}', 'Admin\EmailController@send')->name('email.send');
});
