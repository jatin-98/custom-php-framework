<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../constants.php';

!file_exists(dirname(__DIR__) . '/.env') ? die("Please create a file .env at root from env.example") : '';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$configfiles = loadFileData(_CONFIG_DIR);

$app = new App\Core\Application(dirname(__DIR__), $configfiles);

$app->router->get('/', [App\Controllers\HomeController::class, 'index']);
$app->router->get('/login', [App\Controllers\AuthController::class, 'login']);
$app->router->get('/register', [App\Controllers\AuthController::class, 'register']);
$app->router->get('/contact', [App\Controllers\ContactController::class, 'index']);
$app->router->get('/logout', [App\Controllers\AuthController::class, 'logout']);
$app->router->get('/profile', [App\Controllers\AuthController::class, 'profile']);

$app->router->post('/login', [App\Controllers\AuthController::class, 'login']);
$app->router->post('/register', [App\Controllers\AuthController::class, 'register']);
$app->router->post('/contact', [App\Controllers\ContactController::class, 'store']);

$app->run();
