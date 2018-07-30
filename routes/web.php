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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');

Route::middleware('auth')->group(function () {
    Route::resource('users', 'UserController')->only('show', 'update')->middleware('selfaccount');
    Route::resource('courses', 'CourseController')->only('index', 'show');
});

Route::post('districts', 'DistrictController@update');

Route::post('communes', 'CommuneController@update');

Route::get('fetch_specializes', 'SearchController@fetchSpecialize')->name('fetch_specializes');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('adminDashboard');

    Route::resource('specializes', 'SpecializeController')->except('create', 'show');
});
