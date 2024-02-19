<?php

namespace classes\Exceptions;

class ValidateException extends \Exception
{
    public function __construct($text, $code = 0, Throwable $previous = null)
    {
        parent::__construct($text, $code, $previous);
    }
}