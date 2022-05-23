<?php

namespace app\Services\Base;

use yii\web\Controller;
use yii\web\Request;

class BaseController extends Controller
{
    # api 请求 暂时关闭 Csrf 防范
    public $enableCsrfValidation = false;

    /**
     * Notes:操作前置
     * User: weicheng
     * DateTime: 2022/5/22 15:57
     * @param \yii\base\Action $action
     * @return bool|void
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        return parent::beforeAction($action);

        # 验证器
//        $actionMethod = $action->actionMethod;
//        $controller   = $action->controller;
//
//        $request = new Request();
//        dd($request->get());
    }

    /**
     * Notes:成功返回
     * User: weicheng
     * DateTime: 2022/5/21 23:09
     * @param array $data
     * @param string $msg
     * @param int $code
     * @return \yii\web\Response
     */
    public function successResponse(array $data = [], string $msg = 'success', int $code = 200)
    {
        return $this->asJson([
            'code' => $code,
            'msg'  => $msg,
            'data' => $data
        ]);
    }

    /**
     * Notes:失败返回
     * User: weicheng
     * DateTime: 2022/5/21 23:10
     * @param int $code
     * @param string $msg
     * @param array $data
     * @return \yii\web\Response
     */
    public function errorResponse(int $code = 403, string $msg = 'error', array $data = [])
    {
        return $this->asJson([
            'code' => $code,
            'msg'  => $msg,
            'data' => $data
        ]);
    }

    /**
     * Notes:获取请求参数
     * User: weicheng
     * DateTime: 2022/5/23 16:05
     * @param string $field
     * @return array|mixed|object
     */
    public function inputs(string $field = '')
    {
        $request = \Yii::$app->request;
        $method  = strtoupper($request->method);

        if ($method === 'GET') {
            $params = $field ? $request->get($field) : $request->get();
        } elseif ($method === 'POST') {
            $params = $field ? $request->post($field) : $request->post();
        } else {
            $params = $field ? $request->getBodyParam($field) : $request->bodyParams;
        }

        return $params;
    }
}