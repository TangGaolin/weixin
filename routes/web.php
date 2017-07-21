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
Route::post('/jsSdkData', 'IndexController@jsSdkData');

Route::get('/oauth_callback', 'IndexController@callback'); //网页授权回调
Route::get('/pay_callback', 'IndexController@payCallback'); //支付授权回调

//拓客活动1  重新定向路由
Route::get('/activity/userShare', 'UserShareController@userShare');
Route::get('/activity/getUserShare', 'UserShareController@getUserShare');
//
Route::post('/activity/buyItem', 'UserShareController@buyItem');
Route::post('/userShare/pay_callback', 'UserShareController@payCallback'); //支付授权回调