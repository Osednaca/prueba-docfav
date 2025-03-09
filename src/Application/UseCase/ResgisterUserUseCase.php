<?php
namespace Application\UseCase;

use Domain\Entity\User;
use Domain\ValueObject\UserId;
use Domain\ValueObject\Name;
use Domain\ValueObject\Email;
use Domain\ValueObject\Password;
use Domain\Repository\UserRepositoryInterface;
use Domain\Exception\UserAlreadyExistsException;
use Domain\Event\UserRegisteredEvent;
use Application\DTO\RegisterUserRequest;

class RegisterUserUseCase
{
    private UserRepositoryInterface $userRepository;
    private array $eventListeners = [];

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function addEventListener(callable $listener): void
    {
        $this->eventListeners[] = $listener;
    }

    public function execute(RegisterUserRequest $request): User
    {
        $email = new Email($request->email);
        if ($this->userRepository->findByEmail($email)) {
            throw new UserAlreadyExistsException("Email {$request->email} already exists");
        }

        $user = new User(
            new UserId(),
            new Name($request->name),
            $email,
            new Password($request->password)
        );

        $this->userRepository->save($user);
        
        $event = new UserRegisteredEvent($user->id()->value(), $user->email()->value());
        $this->dispatchEvent($event);

        return $user;
    }

    private function dispatchEvent(UserRegisteredEvent $event): void
    {
        foreach ($this->eventListeners as $listener) {
            $listener($event);
        }
    }
}