<?php

namespace app\Services\Actions;

use app\Services\Base\BaseAction;

class TestAction extends BaseAction
{

    /**
     * Notes:测试
     * User: weicheng
     * DateTime: 2022/5/22 14:34
     */
    public function run()
    {
        return $this->successResponse([], "Hello World!!");
    }
}