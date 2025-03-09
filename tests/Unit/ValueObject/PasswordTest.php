<?php
namespace Tests\Unit\ValueObject;

use Domain\ValueObject\Password;
use Domain\Exception\WeakPasswordException;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    public function testValidPassword(): void
    {
        $password = new Password('Password123!');
        $this->assertTrue($password->verify('Password123!'));
    }

    public function testWeakPasswordNoUppercase(): void
    {
        $this->expectException(WeakPasswordException::class);
        new Password('password123!');
    }

    public function testWeakPasswordTooShort(): void
    {
        $this->expectException(WeakPasswordException::class);
        new Password('Pw1!');
    }
}