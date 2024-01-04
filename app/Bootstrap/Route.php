<?php

namespace App\Bootstrap;

use App\Exceptions\ExceptionHandler;

class Route
{

    private static array $routes = [];

    /**
     * Route Handler, Used To Register Any Endpoint Of The Application
     * @param string $method
     * @param string $path
     * @param string $controller
     * @param array|null $middlewares
     * @return void
     */
    public static function handle(string $method,
                               string $path,
                               string $controller,
                               string $function,
                               array  $middlewares = []): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middlewares
        ];
    }

    /**
     * Process Execution, Used To Execute The Handler Process Of Registered Route
     * @return void
     */
    public static function execute(): void
    {
        $path = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        try {
            foreach (self::$routes as $route) {
                $pattern = "#^" . $route['path'] . "$#";
                if (preg_match($pattern, $path, $variables) && $method == $route['method']) {
                    try {
                        // call middleware
                        foreach ($route['middleware'] as $middleware){
                            $instance = new $middleware;
                            $instance->before();
                        }
    
                        $function = $route['function'];
                        $controller = new $route['controller'];
                        
                        if(!method_exists($controller, $function)) {
                            throw new ExceptionHandler('Function Does Not Exists');
                        }
                        
                        array_shift($variables);
                        call_user_func_array([$controller, $function], $variables);
                        return;
    
                    } catch (ExceptionHandler $e) {
                        throw new ExceptionHandler($e->getMessage());
                        return;
                    }
                   
                }
            }

            // did not match any regex pattern
            // throw somewhere

            header('Location: /');
            exit();

        } catch (ExceptionHandler $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

    }

}