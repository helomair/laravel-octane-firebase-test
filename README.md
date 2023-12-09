# Reproduce bug using Laravel-Octane with laravel-firebase.

## Description
When using laravel-octane (`php artisan octane:start`), inserting or updating data to firestore will be blocked until request timeout.

But use normal (`php artisan serve`) is fine

## Environment
```bash
Laravel: 10.35.0
PHP: 8.1.26 (cli)
Swoole: 5.1.1
OS: Ubuntu 22.04.3 LTS
Postman: 10.20.8
```

## Packages
* laravel-octane
* kreait/laravel-firebase
* google/cloud-firestore


## Test Steps
1. Init project & install packages
```bash
composer create-project laravel/laravel laravel-with-firebase
cd laravel-with-firebase
composer require -W google/cloud-firestore
composer require -W kreait/laravel-firebase
php artisan vendor:publish --provider="Kreait\Laravel\Firebase\ServiceProvider" --tag=config
composer update -W
```
2. Set env
```bash
# In .env
FIREBASE_CREDENTIALS=resources/credentials/firebase.json
OCTANE_SERVER=swoole
```
3. Run server
```bash
# Normal
php artisan serve

# Laravel-Octane
php artisan octane:start
```
4. Send request to api, using Postman
```bash
URL: http://localhost:8000/store
```
5. Result
```bash
# Normal
Status: 200 OK
{"success": true}
Could see data inserted or updated to Firestore.

# Laravel-Octane
Status: 408 Request Timeout
No data inserted or updated.
```