<?php
/**
 * Created by PhpStorm.
 * User: gaolintang
 * Date: 2017/7/19
 * Time: 下午1:47
 */

namespace App\Http\Controllers;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use Request;
class UserShareController extends Controller
{

    protected $weixinApp;
    public function __construct()
    {
        $this->weixinApp = new Application(config('weixin'));
    }



    public function userShare()
    {
        //获取openID
        $user = Request::session()->get('wechat_user');
        if(empty($user)){
            Request::session()->put('target_url','/activity/userShare');
            return $this->weixinApp->oauth->redirect();
        }
        return redirect(config('app.url') . '/userShare/dist/index.html');
    }

    // 用户下单购买
    public function buyItem()
    {
        $user = Request::session()->get('wechat_user');
        // 若是没有订单信息，那么生成预支付统一订单
        $attributes = [
            'trade_type' => 'JSAPI', // JSAPI，NATIVE，APP ...
            'body' => '测试支付1元',
            'detail' => '测试支付',
            'out_trade_no' => date('YmdHis') . mt_rand(100,999),
            'total_fee' => 100, // 单位：分
            'notify_url' => config('app.url') . '/pay_callback', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid' => $user['id'], // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
        ];

        $order = new Order($attributes);

        $result = $this->weixinApp->payment->prepare($order);
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS') {
            $prepayId = $result->prepay_id;
            $config = $this->weixinApp->payment->configForPayment($prepayId, false);
            return response()->json($config);
        }
    }

    // 拓客活动1 被邀请人进入邀请页面
    public function getUserShare()
    {
        //获取openID



        //根据订单ID，查询是否绑定状态







    }






    // 被分享用户领取服务项目
    public function shareItems()
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




}
