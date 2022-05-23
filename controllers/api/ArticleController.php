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

        # 属性标签
        dump((new Articles())->getAttributeLabel('created_at'));
        dump((new Articles())->getAttributeLabel('title'));
        # 获取模型所拥有的属性
        dump((new Articles())->attributes());

        dd('success');

//        $article = Articles::query()->where(['id' => $id])->one();
//        return $this->successResponse($article);
    }

    /**
     * Notes:更新
     * User: weicheng
     * DateTime: 2022/5/23 18:28
     * @param Request $request
     * @return \yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function actionUpdate(Request $request)
    {
        $params = $this->inputs();
        $res    = (new Articles())->updateOrCreate(
            ['id' => $params['id']],
            [
                'uid'    => $params['uid'],
                'status' => $params['status']
            ]
        );
        return $this->successResponse();
    }

}