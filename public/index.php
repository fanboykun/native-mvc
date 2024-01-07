<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Bootstrap\Route;
use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Middleware\AuthMiddleware;

Route::handle('GET', '/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)', ProductController::class, 'categories');

Route::handle('GET', '/', HomeController::class, 'index');
Route::handle('GET', '/dashboard', HomeController::class, 'dashboard', [AuthMiddleware::class]);
Route::handle('GET', '/register', HomeController::class, 'register');

Route::execute();