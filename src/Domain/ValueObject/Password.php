<?php
namespace Domain\ValueObject;

use Domain\Exception\WeakPasswordException;

class Password
{
    private string $hashedValue;

    public function __construct(string $plainPassword)
    {
        $this->validate($plainPassword);
        $this->hashedValue = password_hash($plainPassword, PASSWORD_ARGON2I);
    }

    private function validate(string $password): void
    {
        if (strlen($password) < 8 ||
            !preg_match('/[A-Z]/', $password) ||
            !preg_match('/[0-9]/', $password) ||
            !preg_match('/[!@#$%^&*]/', $password)) {
            throw new WeakPasswordException('Password must be at least 8 characters with uppercase, number and special character');
        }
    }

    public function value(): string
    {
        return $this->hashedValue;
    }

    public function verify(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->hashedValue);
    }
}