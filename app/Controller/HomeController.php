<?php

namespace App\Controller;

use App\Bootstrap\View;

class HomeController
{

    function index(): void
    {
        View::render('index', ['message' => 'Dinamyc Content Layouting'], 'app-layout');
    }

    function dashboard(): void
    {
        View::render('Home/dashboard', ['message' => 'Middlewares', 'user' => $_SESSION['user']], 'app-layout');
    }

    function register() : void
    {
        View::render('register', ['message' => 'MVC Infrastructure', 'note' => 'this is a data that is passed between files, current content is register'], 'app-layout');
    }

    function login(): void
    {
        $request = [
            "username" => $_POST['username'],
            "password" => $_POST['password']
        ];

        $user = [

        ];

        $response = [
            "message" => "Login Sukses"
        ];
        // Send Back the data to the view
    }

}