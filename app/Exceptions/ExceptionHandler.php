<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ExceptionHandler extends Exception
{
    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
    
    public function errorMessage() {
        //error message
        $errorMsg = $this->getMessage();
        return $errorMsg;
    }
}