<?php
namespace Domain\Exception;

use Exception;

class InvalidEmailException extends Exception
{
    public function __construct(string $message = "The provided email format is invalid", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}