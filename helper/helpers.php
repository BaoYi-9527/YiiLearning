<?php

if (!function_exists('randomStr')){
    /**
     * Notes:生成随机字符串
     * User: weicheng
     * DateTime: 2021/3/29 11:24
     * @param int $length
     * @return string
     */
    function randomStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
}

if (!function_exists('errorMsg')){
    /**
     * Notes:获取报错信息
     * User: weicheng
     * DateTime: 2022/5/22 19:16
     * @param $errorCode
     * @return string|string[]
     */
    function errorMsg($errorCode) {
       return \app\Services\Define\ErrorCode::errorCodeMap($errorCode) ?? '';
    }
}