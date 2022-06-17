<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Auth::routes();

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'cache clear success';
});


Route::get('/dashboard', function () {
    return view('auth.login');
});



Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {

        Route::get('/dashboard/home','HomeController@index')->name('dashboard.home');

        Route::prefix('dashboard')->namespace('Dashboard')->middleware(['auth','web'])->name('dashboard.')->group(function () {

            Route::resource('services', 'ServiceController');
            Route::resource('faqs', 'FaqController');
            Route::resource('blogs', 'BlogController');
        });


    });

