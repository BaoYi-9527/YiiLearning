<?php

namespace app\models;

use app\Services\Base\BaseModel;

class Articles extends BaseModel
{

    public $id;
    public $uid;
    public $status;
    public $title;
    public $content;
    public $created_at;
    public $updated_at;
    public $deleted_at;

    /**
     * Notes:自定义标签
     * User: weicheng
     * DateTime: 2022/5/23 17:38
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'title' => '1111'
        ];
    }


}