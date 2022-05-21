<?php

namespace app\controllers\api;

use app\Services\Base\BaseController;

class TestController extends BaseController

{

    public function actionTest()
    {
        $this->successResponse();
    }


}