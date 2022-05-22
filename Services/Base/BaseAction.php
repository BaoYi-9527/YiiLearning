<?php

namespace app\Services\Base;

use yii\base\Action;
use yii\web\Response;

class BaseAction extends Action
{

    /**
     * Notes:成功返回
     * User: weicheng
     * DateTime: 2022/5/21 23:09
     * @param array $data
     * @param string $msg
     * @param int $code
     * @return false|string
     */
    public function successResponse(array $data = [], $msg = 'success', $code = 200)
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
     * @return false|string
     */
    public function errorResponse($code = 403, $msg = 'error', $data = [])
    {
        return $this->asJson([
            'code' => $code,
            'msg'  => $msg,
            'data' => $data
        ]);
    }

    /**
     * Notes:json_encode
     * User: weicheng
     * DateTime: 2022/5/22 14:39
     * @param array $arr
     * @return false|string
     */
    private function asJson(array $arr)
    {
        $response         = new Response();
        $response->format = Response::FORMAT_JSON;
        $response->data   = $arr;
        return $response;
    }
}