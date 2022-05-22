<?php

namespace app\Services\Exceptions;

class ValidateException extends \Exception
{
    public function __construct($msg)
    {
        parent::__construct($msg, 403);
    }

}