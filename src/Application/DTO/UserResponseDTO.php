<?php
namespace Application\DTO;

class UserResponseDTO
{
    public readonly string $id;
    public readonly string $name;
    public readonly string $email;
    public readonly string $createdAt;

    public function __construct(string $id, string $name, string $email, string $createdAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->createdAt = $createdAt;
    }

    /**
     * Converts the DTO to an array for JSON serialization.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'createdAt' => $this->createdAt,
        ];
    }
}