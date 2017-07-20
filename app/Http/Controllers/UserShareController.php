<?php
/**
 * Created by PhpStorm.
 * User: gaolintang
 * Date: 2017/7/19
 * Time: 下午1:47
 */

namespace App\Http\Controllers;
use EasyWeChat\Foundation\Application;

class UserShareController extends Controller
{


    public function __construct()
    {

    }

    // 验证手机号码发送手机验证码
    public function validatePhoneNo()
    {
        $param = [
            'phone_no'   => Request::input('phone_no'),
            'session_id' => Request::session()->getId(),
        ];

        $rule = [
            'phone_no' => ['required', 'regex:/^1[0-9]\d{9}$/']
        ];

        $message = [
            'phone_no.required' => "请填写手机号",
            'phone_no.regex'    => "手机号不正确"
        ];

        $this->validation($param, $rule, $message);

        $data = $this->account->validateAccount($param);
        if (isset($data['statusCode'])) return $data;

        return $this->success();
    }

    // 用户下单购买
    public function buyItem()
    {





    }

    // 被分享用户领取服务项目
    public function shareItems()
    {


    }










}
