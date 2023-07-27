<?php

namespace App\Exceptions;

use Exception;
use Throwable;

{
    class PositiveNumberException extends Exception
    {
        public function __construct($message = "Only positive numbers are allowed.", $code = 0, Throwable $previous = null)
        {
            parent::__construct($message, $code, $previous);
        }
    }
}