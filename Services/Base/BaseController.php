<?php

namespace app\Services\Base;

use yii\web\Controller;

class BaseController extends Controller
{
    /**
     * Notes:成功返回
     * User: weicheng
     * DateTime: 2022/5/21 23:09
     * @param array $data
     * @param string $msg
     * @param int $code
     * @return \yii\web\Response
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
     * @return \yii\web\Response
     */
    public function errorResponse($code = 403, $msg = 'error', $data = [])
    {
        return $this->asJson([
            'code' => $code,
            'msg'  => $msg,
            'data' => $data
        ]);
    }
}