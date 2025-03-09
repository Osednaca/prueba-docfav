<?php
namespace Infrastructure\Controller;

use Application\UseCase\RegisterUserUseCase;
use Application\DTO\RegisterUserRequest;
use Application\DTO\UserResponseDTO;

class RegisterUserController
{
    private RegisterUserUseCase $useCase;

    public function __construct(RegisterUserUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function register(): void
    {
        try {
            $request = new RegisterUserRequest(
                $_POST['name'] ?? '',
                $_POST['email'] ?? '',
                $_POST['password'] ?? ''
            );

            $user = $this->useCase->execute($request);
            
            $response = new UserResponseDTO(
                $user->id()->value(),
                $user->name()->value(),
                $user->email()->value(),
                $user->createdAt()->format('Y-m-d H:i:s')
            );

            header('Content-Type: application/json');
            echo json_encode($response->toArray());
        } catch (\Exception $e) {
            http_response_code(400);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}