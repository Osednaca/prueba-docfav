# prueba-docfav
## Sistema de registro de usuarios

## Requisitos Previos
- [Docker](https://docs.docker.com/get-docker/) y [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/downloads)
- Acceso a una terminal para ejecutar comandos

## Estructura del Proyecto
- src/Domain/: Entidades, Value Objects, Repositorios y Excepciones.
- src/Application/: Casos de uso y DTOs.
- src/Infrastructure/: Controladores y Persistencia (Doctrine).
- tests/: Pruebas unitarias y de integración.
- docker-compose.yml: Configuración de Docker.
- Dockerfile: Imagen PHP personalizada.

## Setup
1. Clonar el repositorio:
```bash
git clone https://github.com/Osednaca/prueba-docfav.git
cd nombre-del-directorio
```

2. Buildear e iniciar los containers:
```bash
docker-compose build
docker-compose up -d
```

3. Instalar las dependencias:
```bash
docker-compose exec app composer install
``` 

4. Correr las migraciones:
```bash
docker-compose exec app php bin/console doctrine:migrations:migrate
```

### Corriendo las pruebas
```bash
docker-compose exec app vendor/bin/phpunit tests
```

### Detener la aplicación
```bash
docker-compose down
```

### API Endpoint
POST /register
Body: { "name": "John Doe", "email": "john@example.com", "password": "Password123!" }
Response: { "id": "uuid", "name": "John Doe", "email": "john@example.com", "createdAt": "2025-03-08 12:00:00" }

