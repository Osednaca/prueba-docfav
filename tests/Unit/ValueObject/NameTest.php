<?php
namespace Tests\Unit\ValueObject;

use Domain\ValueObject\Name;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    public function testValidName(): void
    {
        $name = new Name('John Doe');
        $this->assertEquals('John Doe', $name->value());
    }

    public function testNameTooShort(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('J');
    }

    public function testNameWithInvalidCharacters(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('John123');
    }
}