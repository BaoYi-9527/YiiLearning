<?php

namespace app\Forms\Test;

use app\Services\Base\BaseForm;

class TestForm extends BaseForm
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
        ];
    }



}