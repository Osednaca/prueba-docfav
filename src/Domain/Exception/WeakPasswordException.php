<?php
namespace Domain\Exception;

use Exception;

class WeakPasswordException extends Exception
{
    public function __construct(string $message = "The password does not meet the required security standards", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}