<?php
namespace Tests\Unit\ValueObject;

use Domain\ValueObject\Email;
use Domain\Exception\InvalidEmailException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testValidEmail(): void
    {
        $email = new Email('test@example.com');
        $this->assertEquals('test@example.com', $email->value());
    }

    public function testInvalidEmail(): void
    {
        $this->expectException(InvalidEmailException::class);
        new Email('invalid-email');
    }
}