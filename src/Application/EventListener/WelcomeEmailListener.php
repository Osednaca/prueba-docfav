<?php
namespace Application\EventListener;

use Domain\Event\UserRegisteredEvent;

class WelcomeEmailListener
{
    public function __invoke(UserRegisteredEvent $event): void
    {
        // Simulación de envío de email (en un entorno real usarías un servicio de email)
        $message = sprintf(
            "Welcome! Your account with email %s has been created.",
            $event->email()
        );
        error_log($message); // Simulación: escribir en el log
    }
}