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
Route::get('/','Front\HomeController@index')->name('front.home.index');

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::get('/faqs','Front\FaqController@index')->name('front.faqs.index');
        Route::get('/services','Front\ServiceController@index')->name('front.services.index');
        Route::get('/services-get-service/{id}','Front\ServiceController@getServiceById')->name('front.services.getServiceById');
        Route::get('/blogs','Front\BlogController@index')->name('front.blogs.index');
        Route::get('/blogs-get-blog/{id}','Front\BlogController@getBlogById')->name('front.blogs.getBlogById');


    });

