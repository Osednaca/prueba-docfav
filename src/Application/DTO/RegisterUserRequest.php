<?php
namespace Application\DTO;

class RegisterUserRequest
{
    public readonly string $name;
    public readonly string $email;
    public readonly string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}