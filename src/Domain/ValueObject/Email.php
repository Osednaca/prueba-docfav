<?php
namespace Domain\ValueObject;

use Domain\Exception\InvalidEmailException;

class Email
{
    private string $value;

    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException("Invalid email format: $value");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}