<?php

namespace App\Core;

class App
{
    private static $routes = [];

    public static function get($uri, $controllerAction)
    {
        self::$routes['GET'][$uri] = $controllerAction;
    }

    public static function post($uri, $controllerAction)
    {
        self::$routes['POST'][$uri] = $controllerAction;
    }

    public static function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Menyesuaikan basepath jika dijalankan di subfolder
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        if ($scriptName !== '/' && strpos($uri, $scriptName) === 0) {
            $uri = substr($uri, strlen($scriptName));
        }
        $uri = $uri == '' ? '/' : $uri;

        if (isset(self::$routes[$method])) {
            foreach (self::$routes[$method] as $route => $action) {
                
                // MENGUBAH FORMAT RUTE DINAMIS (Contoh: /user/{id} menjadi Regex)
                $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([^/]+)', $route);
                $pattern = '#^' . $pattern . '$#';

                // JIKA URL COCOK DENGAN POLA REGEX
                if (preg_match($pattern, $uri, $matches)) {
                    array_shift($matches); // Hapus hasil kecocokan penuh, sisakan parameternya saja
                    
                    list($controllerName, $methodName) = explode('@', $action);
                    $controllerClass = "\\App\\Controllers\\" . $controllerName;

                    if (class_exists($controllerClass)) {
                        $controller = new $controllerClass();
                        if (method_exists($controller, $methodName)) {
                            // Eksekusi method dan kirim parameter (ID) yang ditangkap dari URL
                            call_user_func_array([$controller, $methodName], $matches);
                            return; // Hentikan perulangan setelah rute ditemukan
                        } else {
                            self::abort(500, "Error: Method '$methodName' tidak ditemukan di controller '$controllerName'.");
                        }
                    } else {
                        self::abort(500, "Error: Controller '$controllerClass' tidak ditemukan.");
                    }
                }
            }
        }
        
        // Jika tidak ada rute yang cocok sama sekali
        self::abort(404, "404 Not Found - Halaman tidak ditemukan di RON PHP.");
    }

    private static function abort($code, $message = '')
    {
        http_response_code($code);
        echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
        echo "<h1>Error $code</h1>";
        echo "<p>$message</p>";
        echo "</div>";
        exit();
    }
}