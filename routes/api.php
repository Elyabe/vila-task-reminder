<?php

use Illuminate\Http\Request;
use Illuminate\View\View;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['jwt.verify', 'verified']], function () {
    // Users routes
    Route::get('users', 'Api\UserController@findAll');
    Route::get('users/{id}', 'Api\UserController@findById');
    Route::put('users/{id}', 'Api\UserController@update');
    Route::delete('users/{id}', 'Api\UserController@delete');

    //Task
    Route::get('tasks', 'Api\TaskController@findAll');
    Route::get('tasks/{id}', 'Api\TaskController@findById');
    Route::post('tasks', 'Api\TaskController@create');
    Route::put('tasks/{id}', 'Api\TaskController@update');
    Route::delete('tasks/{id}', 'Api\TaskController@delete');
    Route::post('tasks/import', 'Api\TaskController@import');

    Route::put('auth/password-change', 'Api\AuthController@passwordChange');
});

// Register
Route::post('users', 'Api\UserController@create');

// Auth routes
Route::post('auth/login', 'Api\AuthController@authenticate');
Route::post('auth/logout', 'Api\AuthController@logout');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Documentation
Route::get('doc', function (Request $request) {
    return View('apidoc.index');
});
Route::get('/', function (Request $request) {
    return redirect('/doc');
});
