<?php

namespace App\Middleware;

class AuthMiddleware implements Middleware
{

    function before(): void
    {
        session_start();
        $_SESSION['user'] = 'USER';
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }
    }
}