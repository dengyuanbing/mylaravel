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

    /***************获取 *************************************/
    Route::get('category','CategoryController@get');//获取首页报修分类

    Route::get('category/{frist}','CategoryController@getSecond');//根据一级分类获取二级分类

    Route::get('house/{owner?}','HouseController@get');//获取业主房屋地址

    Route::get('repairorders/{ownerid?}','RepairordersController@get');//获取业主报修单信息

    /***************提交 *************************************/
    Route::post('house/create','HouseController@create');//创建房屋信息
});
