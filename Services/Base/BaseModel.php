<?php

namespace app\Services\Base;

use yii\db\ActiveRecord;
use yii\db\Query;

class BaseModel extends ActiveRecord
{
    /**
     * Notes:Query 构造
     * User: weicheng
     * DateTime: 2022/5/23 16:29
     * @return Query
     * @throws \yii\base\InvalidConfigException
     */
    public static function query(): Query
    {
        return (new BaseQuery())->from(self::getTableSchema()->name);
    }

    /**
     * Notes:更新或新增
     * User: weicheng
     * DateTime: 2022/5/23 18:22
     * @param array $condition
     * @param array $attribute
     * @return int
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function updateOrCreate(array $condition, array $attribute): int
    {
        $detail = (new BaseQuery())->from(self::getTableSchema()->name)
            ->where($condition)->one();
        if ($detail) {
            $res = \Yii::$app->db->createCommand()->update(
                self::getTableSchema()->name,
                $attribute,
                $condition
            )->execute();
        } else {
            $res = \Yii::$app->db->createCommand()->insert(
                self::getTableSchema()->name,
                array_merge($condition, $attribute)
            )->execute();
        }
        return $res;
    }



}