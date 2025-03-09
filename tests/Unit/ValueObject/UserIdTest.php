<?php
namespace Tests\Unit\ValueObject;

use Domain\ValueObject\UserId;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class UserIdTest extends TestCase
{
    public function testUserIdCanBeCreatedWithSpecificValue(): void
    {
        $uuid = '123e4567-e89b-12d3-a456-426614174000';
        $userId = new UserId($uuid);

        $this->assertEquals($uuid, $userId->value());
    }

    public function testUserIdGeneratesUuidWhenNoValueProvided(): void
    {
        $userId = new UserId();

        $this->assertNotEmpty($userId->value());
        $this->assertTrue(Uuid::isValid($userId->value()));
    }

    public function testUserIdsWithSameValueAreEqual(): void
    {
        $uuid = '123e4567-e89b-12d3-a456-426614174000';
        $userId1 = new UserId($uuid);
        $userId2 = new UserId($uuid);

        $this->assertTrue($userId1->equals($userId2));
    }

    public function testUserIdsWithDifferentValuesAreNotEqual(): void
    {
        $userId1 = new UserId('123e4567-e89b-12d3-a456-426614174000');
        $userId2 = new UserId('987fcdeb-12d3-45e6-a789-426614174000');

        $this->assertFalse($userId1->equals($userId2));
    }

    public function testUserIdWithGeneratedUuidIsUnique(): void
    {
        $userId1 = new UserId();
        $userId2 = new UserId();

        $this->assertNotEquals($userId1->value(), $userId2->value());
        $this->assertFalse($userId1->equals($userId2));
    }
}