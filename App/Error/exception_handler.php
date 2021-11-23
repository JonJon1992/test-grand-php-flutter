<?php

namespace App\Error;

use Exception;

final class ExceptionMessageHandle extends Exception
{
    public function __construct($message, $code = 0, Exception $exc = null)
    {
        parent::__construct($message, $code, $exc);
    }

    public function __toString(): string
    {
        return __CLASS__ . ":[{$this->code}: {$this->message}\n";
    }
}
