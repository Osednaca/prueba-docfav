<?php
namespace Domain\Exception;

use Exception;

class UserAlreadyExistsException extends Exception
{
    public function __construct(string $message = "A user with this email already exists", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}