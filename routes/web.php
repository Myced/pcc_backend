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

Route::get('/', function() { return redirect()->route('home'); });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users', 'UsersController@index')->name("users");
Route::get('/users/{id}', 'UsersController@show')->name('user.show');
Route::post('/users/{id}/password/update', 'UsersController@updatePassword')->name('user.password.update');
Route::post('/users/{id}/info/update', 'UsersController@updateUserInfo')->name('user.info.update');