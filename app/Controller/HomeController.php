<?php

namespace App\Controller;

use App\Bootstrap\View;

class HomeController
{

    function index(): void
    {
        $model = [
            "title" => "Native PHP MVC",
            "content" => "Place Any Data"
        ];

        View::render('Home/index', $model);
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

    function register() : void
    {
        $data = ['message' => 'content here'];
        View::render('register', $data, 'app-layout');
    }

}