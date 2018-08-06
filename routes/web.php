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
    Route::get('users/{id}/notifications', 'NotificationController@index')->name('users.notifications');
    Route::resource('courses', 'CourseController')->only('index', 'show');
    Route::post('courses_users/activeCourse', 'CoursesUserController@changeStatus');
    Route::resource('notifications', 'NotificationController')->only('index', 'store');
    Route::post('notifications/changeReadStatus', 'NotificationController@changeReadStatus');
    Route::post('notifications/acceptCourseRequest', 'NotificationController@acceptCourseRequest');
    Route::post('notifications/deleteNotification', 'NotificationController@deleteNotification');

    Route::get('courses/{id}/lectures', 'LectureController@index');
    Route::post('courses/{id}/lectures/store', 'LectureController@store');
    Route::get('courses/{id}/lectures/{lectureId}', 'LectureController@show');
});

Route::post('districts', 'DistrictController@update');

Route::post('communes', 'CommuneController@update');

Route::get('fetch_specializes', 'SearchController@fetchSpecialize')->name('fetch_specializes');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admins.'], function () {
    Route::get('/', 'AdminController@index')->name('adminDashboard');
    Route::resource('specializes', 'SpecializeController')->except('create', 'show');
    Route::resource('users', 'UserController')->except('create', 'edit');
    Route::resource('online_classrooms', 'OnlineClassroomController')->except('create');
    Route::resource('courses', 'CourseController')->except('create');
});
