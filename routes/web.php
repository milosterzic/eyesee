<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'ThreadsController@index')->name('welcome');

Route::group(['prefix' => '/auth', 'name' => 'auth'], function () {
    Route::get('redirect', 'LoginController@socialLogin')->name('login');

    Route::get('callback', 'LoginController@handleProviderCallback');

    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::resource('threads', 'ThreadsController')->except([
    'index', 'show'
])->middleware('auth');

Route::resource('threads', 'ThreadsController')->only([
    'index', 'show'
]);
