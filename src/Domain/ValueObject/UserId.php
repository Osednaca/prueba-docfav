<?php
namespace Domain\ValueObject;

use Ramsey\Uuid\Uuid;

class UserId
{
    private string $value;

    public function __construct(?string $value = null)
    {
        $this->value = $value ?? Uuid::uuid4()->toString();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(UserId $other): bool
    {
        return $this->value === $other->value;
    }
}