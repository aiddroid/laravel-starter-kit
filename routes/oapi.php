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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:oapi');


Route::group(['namespace' => 'OApi', 'middleware' => ['cors']], function (){

    Route::any('/user/info', 'UserController@info')->name('oapi.user.info');
    Route::any('/user/all', 'UserController@all')->name('oapi.user.all');
});