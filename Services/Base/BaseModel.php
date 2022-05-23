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


}