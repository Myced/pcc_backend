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
Route::get('/echos', 'PresbyterianEchoController@index')->name('echos');
Route::get('/echos/create', 'PresbyterianEchoController@create')->name('echo.create');
Route::post('/echos/store', 'PresbyterianEchoController@store')->name('echo.store');
Route::get('/messengers', 'MessengerController@index')->name('messengers');
Route::get('/messengers/create', 'MessengerController@create')->name('messenger.create');
Route::post('/messengers/store', 'MessengerController@store')->name('messenger.store');

Route::group(['prefix' => 'diary'], function(){
    Route::group(['prefix' => 'manage'], function(){
        Route::get('/', 'DiaryController@manageYears')->name('diary.manage.years');
        Route::post('/store', 'DiaryController@store')->name("diary.store");
    });
});

Route::group(['prefix' => 'reports'], function(){
    Route::get('/purchases', 'ReportsController@purchases')->name('reports.purchases');
});