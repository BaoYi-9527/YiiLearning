<?php

namespace app\Services\Define;

class ErrorCode
{
    public static function errorCodeMap($errorCode){
       return [
           self::VALIDATE_ERROR => '请求参数非法',
       ];
    }

    # 系统级别错误
    const VALIDATE_ERROR = 10000;

    # 业务级别错误

    # 提示信息


}