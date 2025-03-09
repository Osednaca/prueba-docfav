<?php
namespace Domain\Event;

class UserRegisteredEvent
{
    private string $userId;
    private string $email;

    public function __construct(string $userId, string $email)
    {
        $this->userId = $userId;
        $this->email = $email;
    }

    public function userId(): string
    {
        return $this->userId;
    }

    public function email(): string
    {
        return $this->email;
    }
}