<?php
namespace Tests\Unit;

use Domain\Entity\User;
use Domain\ValueObject\UserId;
use Domain\ValueObject\Name;
use Domain\ValueObject\Email;
use Domain\ValueObject\Password;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCanBeCreated(): void
    {
        $user = new User(
            new UserId('123e4567-e89b-12d3-a456-426614174000'),
            new Name('John Doe'),
            new Email('john.doe@example.com'),
            new Password('Password123!')
        );

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('123e4567-e89b-12d3-a456-426614174000', $user->id()->value());
        $this->assertEquals('John Doe', $user->name()->value());
        $this->assertEquals('john.doe@example.com', $user->email()->value());
        $this->assertTrue($user->password()->verify('Password123!'));
    }
}