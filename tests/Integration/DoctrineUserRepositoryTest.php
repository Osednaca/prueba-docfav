<?php
namespace Tests\Integration;

use Domain\Entity\User;
use Domain\ValueObject\UserId;
use Domain\ValueObject\Name;
use Domain\ValueObject\Email;
use Domain\ValueObject\Password;
use Infrastructure\Persistence\DoctrineUserRepository;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class DoctrineUserRepositoryTest extends TestCase
{
    private EntityManager $entityManager;
    private DoctrineUserRepository $repository;

    protected function setUp(): void
    {
        // Configurar Doctrine con una base de datos en memoria o de prueba
        $this->entityManager = $this->createTestEntityManager(); // Implementación depende de tu setup
        $this->repository = new DoctrineUserRepository($this->entityManager);
    }

    public function testSaveAndFindUser(): void
    {
        $user = new User(
            new UserId('123e4567-e89b-12d3-a456-426614174000'),
            new Name('John Doe'),
            new Email('john@example.com'),
            new Password('Password123!')
        );

        $this->repository->save($user);
        $foundUser = $this->repository->findById(new UserId('123e4567-e89b-12d3-a456-426614174000'));

        $this->assertNotNull($foundUser);
        $this->assertEquals('john@example.com', $foundUser->email()->value());
    }

    protected function tearDown(): void
    {
        $this->entityManager->close();
    }

    private function createTestEntityManager(): EntityManager
    {
        // Configuración básica para pruebas con SQLite en memoria
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../../src/Domain/Entity'], true);
        return \Doctrine\ORM\EntityManager::create(
            ['driver' => 'pdo_sqlite', 'memory' => true],
            $config
        );
    }
}