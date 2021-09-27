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

Route::group(['prefix' => 'auth'], function(){
    Route::post('/login', 'Api\AuthController@login');
    Route::post('/register', 'Api\AuthController@register');
});

Route::get('/echos', 'Api\BooksController@echos');
Route::get('/echos/all', 'Api\BooksController@allEchos');
Route::get('/messengers', 'Api\BooksController@messengers');
Route::get('/messengers/all', 'Api\BooksController@allMessengers');
Route::get('/diary/years', 'Api\DiaryController@diaryYears');
Route::get('/diary/detail/{year}', 'Api\DiaryController@diaryDetail');
Route::post('/user/purchase/add', 'Api\PurchaseController@addPurchase');
Route::post('/user/purchase/list', 'Api\PurchaseController@purchaseList');
Route::get('/get-purchase-item/{code}', 'Api\PurchaseController@getPurchaseItem');

//MTN Momo CallBack URL
Route::post('/momo/callback', 'MomoCallback@index')->name('momo.callback');
