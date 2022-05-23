<?php

namespace app\controllers\api;

use app\models\Articles;
use \app\Services\Base\BaseController;
use yii\web\Request;

class ArticleController extends BaseController
{

    /**
     * Notes:文章详情
     * User: weicheng
     * DateTime: 2022/5/23 16:24
     * @param Request $request
     * @return \yii\web\Response
     * @throws \yii\base\InvalidConfigException
     */
    public function actionDetail(Request $request)
    {
        $params   = $this->inputs();
        $id       = $this->inputs('id');
        $articles = Articles::query()->where(['id' => 2])->one();
        return $this->successResponse($articles);
    }

}