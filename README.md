## To-Do List API (Laravel) — Test Task

REST API for managing tasks (To-Do List) built with PHP using the Laravel framework.

### Stack

- PHP 8.x
- Laravel
- MySQL
- Docker


- spatie/laravel-data

### Project Setup

Copy .env file:

`cp .env.example .env`

Start Docker containers:

`docker compose up -d`

Install dependencies and generate application key:

`docker compose exec app composer install`

`docker compose exec app php artisan key:generate`

Run database migrations:

`docker compose exec app php artisan migrate`
