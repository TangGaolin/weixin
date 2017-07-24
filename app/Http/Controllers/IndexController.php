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

    // jssdk api
    public function jsSdkData()
    {
        $url = Request::input('url',"");
        $functions = Request::input('functions', ['onMenuShareTimeline, onMenuShareAppMessage']);
        if($url){
            $this->weixinApp->js->setUrl($url);
        }
        return $this->weixinApp->js->config($functions, config('app.debug'), false, false);
    }

    //支付成功回调
    public function payCallback()
    {

        $response = $this->weixinApp->payment->handleNotify(function($notify, $successful){
            // 业务处理

            return true; // 返回处理完成
        });
        return $response;

    }





}
