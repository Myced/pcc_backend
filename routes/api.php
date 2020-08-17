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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/echos', 'Api\BooksController@echos');
Route::get('/echos/all', 'Api\BooksController@allEchos');
Route::get('/messengers', 'Api\BooksController@messengers');
Route::get('/messengers/all', 'Api\BooksController@allMessengers');
