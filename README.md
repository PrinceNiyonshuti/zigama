<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About - Zigama

Banking backend app builded using laravel and sanctum for depositing , withdrawing and being able to transfer money to another account.

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
