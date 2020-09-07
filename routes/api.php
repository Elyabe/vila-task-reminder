<?php

use Illuminate\Http\Request;

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


// Auth routes
Route::post('auth/register', 'Api\UserController@create');
Route::post('auth/login', 'Api\AuthController@authenticate');

// Task routes
Route::group(['middleware' => ['jwt.verify', 'verified']], function () {
    // Users routes
    Route::get('users', 'Api\UserController@findAll')->middleware('jwt.auth');
    Route::get('users/{id}', 'Api\UserController@findById');
    Route::post('users', 'Api\UserController@create');
    Route::delete('users/{id}', 'Api\UserController@delete');

    //Task
    Route::get('tasks', 'Api\TaskController@findAll');
    Route::get('tasks/{id}', 'Api\TaskController@findById');
    Route::post('tasks', 'Api\TaskController@create');
    Route::delete('tasks/{id}', 'Api\TaskController@delete');
});

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::post('reminders', 'ReminderTaskController@send')->name('verification.resend');
