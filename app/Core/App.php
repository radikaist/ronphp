<?php

namespace App\Core;

class App
{
    private static $routes = [];

    public static function get($uri, $controllerAction)
    {
        self::$routes['GET'][$uri] = $controllerAction;
    }

    public static function run()
    {
        // Ambil URL yang diketik user
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Cek apakah URL ada di daftar routes/web.php
        if (isset(self::$routes[$method][$uri])) {
            $action = self::$routes[$method][$uri];
            list($controllerName, $methodName) = explode('@', $action);
            
            $controllerClass = "\\App\\Controllers\\" . $controllerName;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if (method_exists($controller, $methodName)) {
                    call_user_func([$controller, $methodName]);
                } else {
                    echo "Error: Method $methodName tidak ditemukan!";
                }
            } else {
                echo "Error: Controller $controllerClass tidak ditemukan!";
            }
        } else {
            http_response_code(404);
            echo "<h1>404 Not Found</h1><p>Halaman tidak ditemukan di RON PHP.</p>";
        }
    }
}