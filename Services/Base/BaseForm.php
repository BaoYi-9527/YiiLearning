<?php

namespace app\Services\Base;

use app\Services\Define\ErrorCode;
use app\Services\Exceptions\ValidateException;
use yii\base\Model;

class BaseForm extends Model
{
    public function validator($requestParams)
    {
        $this->load($requestParams);
        $validate = $this->validate();
        if ($validate) {
            return true;
        } else {
            $errors = $this->errors;
            $errorsArr = [
                'code' => ErrorCode::VALIDATE_ERROR,
                'msg'  => errorMsg(ErrorCode::VALIDATE_ERROR),
                'data' => $errors
            ];
            throw new ValidateException(json_encode($errorsArr));
        }
    }
}