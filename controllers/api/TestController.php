<?php

namespace app\controllers\api;

use app\Forms\Test\TestForm;
use app\Services\Actions\TestAction;
use app\Services\Base\BaseController;
use app\Services\Exceptions\ValidateException;
use yii\web\Request;
use yii\web\Response;

class TestController extends BaseController
{
    public function actions()
    {
        return [
            'action-test' => TestAction::class
        ];
    }

    public function actionTest()
    {
        $this->successResponse();
    }

    /*
     * 请求测试
     */
    public function actionRequest(Request $request)
    {
        $method     = $request->method;
        $getParams  = $request->post();
        $postParams = $request->get();
        $bodyParams = $request->bodyParams;
        $param      = $request->getBodyParam('a');

        dump($request->isAjax); // 请求是一个 ajax 请求
        dump($request->isGet);  // 请求方法是 GET
        dump($request->isPost); // 请求方法是 POST
        dump($request->isPut);  // 请求方法是 PUT

        dump($request->url);            // /api/test/request?id=10086
        dump($request->absoluteUrl);    // http://www.yii.local.com/api/test/request?id=10086
        dump($request->hostInfo);       // http://www.yii.local.com
        dump($request->pathInfo);       // api/test/request
        dump($request->queryString);    // id=10086
        dump($request->baseUrl);        // "" [主机信息之后， 入口脚本之前的部分。]
        dump($request->scriptUrl);      // /index.php
        dump($request->serverName);     // www.yii.local.com
        dump($request->serverPort);     // 80


        $headers = $request->headers;             // 请求头
        dump($headers->get('Accept'));      // 获取请求头信息
        dump($headers->has('user-agent'));  // 判断请求头信息

        dump($request->userHost);   // 客户端主机名
        dump($request->userIP);     // 客户端IP地址

        dd($method, $getParams, $postParams, $bodyParams, $param);
    }

    public function actionResponse()
    {
        $response = new Response();
        # 自定义状态码
        $response->statusCode = 200; // 默认 200

        # HTTP头部
        $headers = $response->headers;
        // 增加一个 Pragma 头，已存在的 Pragma 头不会被覆盖。
        $headers->add('Pragma', 'no-cache');
        // 设置一个Pragma 头. 任何已存在的 Pragma 头都会被丢弃
        $headers->set('Pragma', 'no-cache');
        // 删除 Pragma 头并返回删除的 Pragma 头的值到数组
        $values = $headers->remove('Pragma');

        # 响应主体
//        $response->content = "hello world!!";

        # 响应格式化
        $response->format = Response::FORMAT_JSON;
        $response->data   = ['msg' => 'hello world!!!'];

        return $response;
    }

    public function actionValidate(Request $request)
    {
        (new TestForm())->validator($request->get());
    }

}