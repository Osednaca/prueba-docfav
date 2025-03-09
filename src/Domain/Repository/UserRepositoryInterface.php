<?php
namespace Domain\Repository;

use Domain\Entity\User;
use Domain\ValueObject\UserId;
use Domain\ValueObject\Email;

interface UserRepositoryInterface
{
    /**
     * Saves a User entity to the persistence layer.
     *
     * @param User $user The user to save
     * @return void
     */
    public function save(User $user): void;

    /**
     * Finds a User by its unique identifier.
     *
     * @param UserId $id The user's ID
     * @return User|null The found user or null if not found
     */
    public function findById(UserId $id): ?User;

    /**
     * Finds a User by its email.
     *
     * @param Email $email The user's email
     * @return User|null The found user or null if not found
     */
    public function findByEmail(Email $email): ?User;

    /**
     * Deletes a User by its unique identifier.
     *
     * @param UserId $id The user's ID
     * @return void
     */
    public function delete(UserId $id): void;
}