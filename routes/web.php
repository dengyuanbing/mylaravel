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
    return view('welcome');
});

Route::get('/user', 'UserController@index');

Route::get('/sms', 'TestController@sendsms');

Route::namespace('Homeowner')->prefix('homeowner')->group(function () {
    Route::get('category','CategoryController@get');

    Route::get('house/{owner?}','HouseController@get');//获取业主房屋地址
});
