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
Route::post('/jsSdkData', 'IndexController@jsSdkData');  // 获取支付回调

Route::get('/oauth_callback', 'IndexController@callback'); //网页授权回调
Route::get('/pay_callback', 'IndexController@payCallback'); //支付授权回调

//拓客活动1  重新定向路由
Route::get('/activity/userShare', 'UserShareController@userShare'); // 主页面重定向
Route::get('/activity/getUserShare', 'UserShareController@getUserShare'); //分享用户的页面

Route::post('/userShare/getUserStatus', 'UserShareController@getUserStatus');  // 获取用户状态
Route::post('/userShare/buyItem', 'UserShareController@buyItem');  // 购买接口
Route::post('/userShare/joinAct', 'UserShareController@joinAct');  // 参与活动接口
Route::post('/userShare/getItems', 'UserShareController@getItems');  // 用户领取接口
Route::post('/userShare/pay_callback', 'UserShareController@payCallback'); // 支付授权回调
Route::post('/userShare/getOrderInfo', 'UserShareController@getOrderInfo'); // 获取订单信息