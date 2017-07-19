<?php
/**
 * Created by PhpStorm.
 * User: gaolintang
 * Date: 2017/7/19
 * Time: 下午1:47
 */

namespace App\Http\Controllers;
use EasyWeChat\Foundation\Application;

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


    public function userShare()
    {



    }







}
