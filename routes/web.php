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

Route::get('/callback/index', 'IndexController@index');

Route::get('/oauth_callback', 'IndexController@callback');

//拓客活动1  重新定向路由
Route::get('/activity/userShare', 'IndexController@userShare');
Route::get('/activity/getUserShare', 'IndexController@getUserShare');
//
Route::get('/activity/buyItem', 'UserShareController@buyItem');
