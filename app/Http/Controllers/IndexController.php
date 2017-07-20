<?php
/**
 * Created by PhpStorm.
 * User: gaolintang
 * Date: 2017/7/19
 * Time: 下午1:47
 */

namespace App\Http\Controllers;
use EasyWeChat\Foundation\Application;
use Request;
class IndexController extends Controller
{
    protected $weixinApp;

    public function __construct()
    {
        $this->weixinApp = new Application(config('weixin'));
    }

    public function index()
    {

        $this->weixinApp->server->setMessageHandler(function ($message) {
            if ($message->MsgType == 'event') {
                switch ($message->Event) {
                    case 'SCAN':
//                        $result = $this->wechatService->attention($message);
//                        return $result;
                        break;
                    case 'subscribe':
//                        $result = $this->wechatService->attention($message);
//                        return $result;
                        break;
                    case 'unsubscribe':
//                        $result = $this->wechatService->unbind($message->FromUserName);
//                        return $result;
                        break;
                }
            }

            if ($message->MsgType == 'image') {
//                $this->wechatService->uploadImg($message);
            }

            if ($message->MsgType == 'text') {
//                $result = $this->wechatService->textEvent($message, $this->weixinApp);
//                return $result;
            }
            return false;
        });

        $response = $this->weixinApp->server->serve();
        return $response->send();
    }

    // 网页授权回调
    public function callback()
    {
        $user = $this->weixinApp->oauth->user();
        Request::session()->put('wechat_user', $user->toArray());
        $target_url = Request::session()->get('target_url');
        $targetUrl = empty($target_url) ? '/' : $target_url;
        return redirect(config('app.url') . '/' . $targetUrl);
    }

    //支付成功回调
    public function payCallback()
    {

        $response = $this->weixinApp->payment->handleNotify(function($notify, $successful){
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
//            $order = $this->getOrder($notify->out_trade_no);
//            if (!$order) { // 如果订单不存在
//                return 'Order not exist.'; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
//            }
//            // 如果订单存在
//            // 检查订单是否已经更新过支付状态
//            if ($order->paid_at) { // 假设订单字段“支付时间”不为空代表已经支付
//                return true; // 已经支付成功了就不再更新了
//            }
//            // 用户是否支付成功
//            if ($successful) {
//                // 不是已经支付状态则修改为已经支付状态
//                $order->paid_at = time(); // 更新支付时间为当前时间
//                $order->status = 'paid';
//            } else { // 用户支付失败
//                $order->status = 'paid_fail';
//            }
//            $order->save(); // 保存订单
            return true; // 返回处理完成
        });
        return $response;

    }





}
