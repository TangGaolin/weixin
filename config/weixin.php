<?php
/**
 * Created by PhpStorm.
 * User: gaolintang
 * Date: 2017/7/19
 * Time: 下午1:50
 */

return [
    /**
     * Debug 模式，bool 值：true/false
     *
     * 当值为 false 时，所有的日志都不会记录
     */
    'debug'   => env('APP_DEBUG'),
    /**
     * 账号基本信息，请从微信公众平台/开放平台获取
     */
    'app_id'  => env('APP_ID'),
    'secret'  => env('SECRET'),
    'token'   => env('TOKEN'),
    'aes_key' => env('AES_KEY'),
    /**
     * 日志配置
     *
     * level: 日志级别, 可选为：
     *         debug/info/notice/warning/error/critical/alert/emergency
     * permission：日志文件权限(可选)，默认为null（若为null值,monolog会取0644）
     * file：日志文件位置(绝对路径!!!)，要求可写权限
     */
    'log' => [
        'level'      => 'debug',
        'permission' => 0777,
        'file'       => storage_path('logs') . '/easywechat.log',
    ],
    /**
     * OAuth 配置
     *
     * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
     * callback：OAuth授权完成后的回调页地址
     */
    'oauth' => [
        'scopes'   => ['snsapi_userinfo'],
        'callback' => '/oauth_callback',
    ],
    /**
     * 微信支付
     */
    'payment' => [
        'merchant_id'        => env('MERCHANT_ID'),
        'key'                => env('PAY_KEY'),
        'cert_path'          => '/data/app/.conf/apiclient_cert.pem', // XXX: 绝对路径！！！！
        'key_path'           => '/data/app/.conf/apiclient_key.pem',  // XXX: 绝对路径！！！！
        'notify_url'         => '/pay_callback',       // 你也可以在下单时单独设置来想覆盖它
        // 'device_info'     => '013467007045764',
        // 'sub_app_id'      => '',
        // 'sub_merchant_id' => '',
        // ...
    ],
    /**
     * Guzzle 全局设置
     *
     * 更多请参考： http://docs.guzzlephp.org/en/latest/request-options.html
     */
    'guzzle' => [
        'timeout' => 3.0, // 超时时间（秒）
        //'verify' => false, // 关掉 SSL 认证（强烈不建议！！！）
    ],
];