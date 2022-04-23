## About - Zigama

Banking backend app builded using laravel and sanctum for depositing , withdrawing and being able to transfer money to another account.

### Frontend 

Frontend will be implemented using VueJS Inertia

## Documentation

before starting to run the project

### Requirements

-   create your .env file
-   create your database

### after run these script

    Run composer install
    Run cp .env.example .env or copy .env.example .env
    Run php artisan key:generate
    Run php artisan migrate
    Run php artisan db:seed
    Run php artisan storage:link
