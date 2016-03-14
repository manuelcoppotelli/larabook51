<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

// Authentication routes...
Route::get('/login', ['as' => 'login_path', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', ['as' => 'logout_path', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('/register', ['as' => 'register_path', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', ['as' => 'password_reset', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', ['as' => 'register_reset', 'uses' => 'Auth\PasswordController@postReset']);

// Statuses
Route::get('/statuses', ['as' => 'statuses_path', 'uses' => 'StatusesController@index']);
Route::post('/statuses', 'StatusesController@store');

// Users
Route::get('users', 'UsersController@index');
