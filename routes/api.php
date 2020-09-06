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

// Users routes
Route::get('users', 'Api\UserController@findAll')->middleware('jwt.auth');
Route::get('users/{id}', 'Api\UserController@findById');
Route::post('users', 'Api\UserController@create');
Route::delete('users/{id}', 'Api\UserController@delete');

// Auth routes
Route::post('auth/register', 'Api\UserController@create');
Route::post('auth/login', 'Api\AuthController@authenticate');

// Task routes
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('tasks', 'Api\TaskController@findAll');
    Route::get('tasks/{id}', 'Api\TaskController@findById');
    Route::post('tasks', 'Api\TaskController@create');
    Route::delete('tasks/{id}', 'Api\TaskController@delete');
});
