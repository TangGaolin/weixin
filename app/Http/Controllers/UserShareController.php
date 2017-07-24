<?php
/**
 * Created by PhpStorm.
 * User: gaolintang
 * Date: 2017/7/19
 * Time: 下午1:47
 */

namespace App\Http\Controllers;
use App\Services\UserShareService;
use EasyWeChat\Foundation\Application;
use EasyWeChat\Payment\Order;
use Request;
class UserShareController extends Controller
{

    protected $weixinApp;
    protected $userShareService;
    public function __construct(UserShareService $userShareService)
    {
        $this->weixinApp = new Application(config('weixin'));
        $this->userShareService = $userShareService;
    }

    //page index ---------------------      活动首界面
    public function userShare()
    {
        //获取openID
        $user = Request::session()->get('wechat_user');
        if(empty($user)){
            Request::session()->put('target_url', '/activity/userShare');
            return $this->weixinApp->oauth->redirect();
        }
        return redirect(config('app.url') . '/userShare/dist/index.html#/index');
    }
    //获取 用户状态
    public function getUserStatus()
    {
        $user = Request::session()->get('wechat_user');
        //获取成功支付的订单信息
        $order = $this->userShareService->getOrderInfo([
            'open_id' => $user['id'],
            'status'  => 1,
        ]);
        $data['order_id'] = "";
        if($order) {
            $data['order_id'] = $order['order_id'];
        }
        return $this->success($data);
    }

    // 获取订单信息
    public function getOrderInfo()
    {

        $param = [
            'order_id' =>  Request::input('order_id')
        ];
        $rule = [
            'order_id' => 'required'
        ];
        $this->validation($param, $rule);

        //获取成功支付的订单信息
        $order = $this->userShareService->getOrderInfo($param);

        if(!$order){
            return $this->fail('103','no order info');
        }

        $user_open_ids[] = $order['open_id'];
        $returnData['bind_status'] = 0;
        if($order['share_open_id']) {
            $returnData['bind_status'] = 1;
            $user_open_ids[] = $order['share_open_id'];
        }
        // 获取用户信息
        $user_info_list = $this->weixinApp->user->batchGet($user_open_ids)->toArray();
        $users = $user_info_list['user_info_list'];

        $returnData['user_name'] = empty($order['user_name']) ? $users[0]['nickname'] : $order['user_name'];
        $returnData['headimgurl'] = $users[0]['headimgurl'];

        $returnData['share_user'] = "";
        $returnData['share_headimgurl'] = "";
        if($returnData['bind_status']){
            $returnData['share_user'] = empty($order['share_user']) ? $users[1]['nickname'] : $order['share_user'];
            $returnData['share_headimgurl'] = $users[1]['headimgurl'];
        }

        return $this->success($returnData);
    }

    // 用户下单购买
    public function buyItem()
    {
        // 获取用户提交参数
        $param = [
            'phone_no'   => Request::input('phone_no'),
            'user_name'  => Request::input('user_name', ""),
        ];
        $rule = [
            'phone_no' => ['required', 'regex:/^1[0-9]\d{9}$/']
        ];
        $message = [
            'phone_no.required' => "请填写手机号！",
            'phone_no.regex'    => "手机号不正确"
        ];
        $this->validation($param, $rule, $message);
        $user = Request::session()->get('wechat_user');

        if(empty($user)){
           return $this->fail(102,"该页面已经失效，请退出重新载入");
        }

        $order_id = date('YmdHis') . mt_rand(100, 999);
        $attributes = [
            'trade_type'   => 'JSAPI', // JSAPI，NATIVE，APP ...
            'body'         => '你请客，我付钱活动',
            'detail'       => '你请客，我付钱活动',
            'out_trade_no' => $order_id,
            'total_fee'    => 10, // 单位：分
            'notify_url'   => config('app.url') . '/userShare/pay_callback', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid'       => $user['id'], // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识
        ];

        $order = new Order($attributes);
        $result = $this->weixinApp->payment->prepare($order); //生产预支付订单
        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS') {
            $prepayId = $result->prepay_id;
            $config = $this->weixinApp->payment->configForPayment($prepayId, false);
            $order_data = [
                'order_id'  => $order_id,
                'open_id'   => $user['id'],
                'user_name' => $param['user_name'],
                'phone_no'  => $param['phone_no'],
            ];
            $this->userShareService->buyItem($order_data);
            return $this->success($config);
        }
    }

    //购买支付回调
    public function payCallback()
    {
        $response = $this->weixinApp->payment->handleNotify(function($notify, $successful){
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $order = $this->userShareService->getOrderInfo(['order_id' => $notify->out_trade_no]);
            if (empty($order)) { // 如果订单不存在
                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }
            // 如果订单存在
            // 检查订单是否已经更新过支付状态
            if (0 != $order['status']) { // 不是待支付状态就返回
                return true;
            }
            // 用户是否支付成功
            if ($successful) {
                // 不是已经支付状态则修改为已经支付状态
                $this->userShareService->updateOrder(['order_id' => $order['order_id']],['status' => 1]);
            } else { // 用户支付失败
                $this->userShareService->updateOrder(['order_id' => $order['order_id']],['status' => -1]);
            }
            return true; // 返回处理完成
        });
        return $response;
    }

    //page share  ---------------- 被邀请人进入邀请页面
    public function getUserShare()
    {
        //查询 订单信息
        $param = [
            'order_id' =>  Request::input('order_id')
        ];
        $rule = [
            'order_id' => 'required'
        ];
        $message = [
            'order_id.required' => "该页面不存在！"
        ];
        $this->validation($param, $rule, $message);

        //获取openID
        $user = Request::session()->get('wechat_user');
        if(empty($user)){
            Request::session()->put('target_url','/activity/getUserShare?order_id=' . $param['order_id']);
            return $this->weixinApp->oauth->redirect();
        }
        return redirect(config('app.url') . '/userShare/dist/index.html#/getShare?order_id=' . $param['order_id']);
    }

    // 被分享用户领取服务项目
    public function getItems()
    {
        //查询 订单信息
        $param = [
            'order_id'   => Request::input('order_id'),
            'share_user' => Request::input('share_user'),
            'share_phone_no' => Request::input('share_phone_no')
        ];
        $rule = [
            'order_id' => 'required',
            'share_phone_no' => 'required',
        ];
        $message = [
            'order_id.required' => "缺少领取凭证",
            'share_phone_no.required' => "请输入手机号码！"
        ];
        $this->validation($param, $rule, $message);

        $user = Request::session()->get('wechat_user');

        //检查凭证是否有效
        $order = $this->userShareService->getOrderInfo(['order_id' => $param['order_id']]);
        if($order['share_open_id']) {
            return $this->fail(104,"该邀请已经被绑定，来了解下活动详情吧");
        }

        //开始绑定
        $updateData = [
            'share_user'     => $param['share_user'],
            'share_phone_no' => $param['phone_no'],
            'share_open_id'  => $user['share_open_id']
        ];
        $this->userShareService->updateOrder(['order_id' => $param['order_id']], $updateData);

        //发送消息通知
        return $this->success();
    }




}
