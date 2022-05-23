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


}