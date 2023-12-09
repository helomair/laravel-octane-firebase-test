# Reproduce bug using Laravel-Octane with laravel-firebase.

## Build steps
1. Steps from laravel-firebase
```bash
composer create-project laravel/laravel laravel-with-firebase
cd laravel-with-firebase
composer require -W kreait/laravel-firebase
php artisan vendor:publish --provider="Kreait\Laravel\Firebase\ServiceProvider" --tag=config
composer update -W
```
2. 