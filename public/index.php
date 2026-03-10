<?php
// --- NYALAKAN LAMPU DEBUG ---
error_reporting(E_ALL);
ini_set('display_errors', 1);
// ----------------------------

// 1. RON PHP Native Autoloader (Pengganti Composer)
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});

// 2. Muat file rute
require_once __DIR__ . '/../routes/web.php';

// 3. Muat file konfigurasi (BARIS BARU)
require_once __DIR__ . '/../app/Config/config.php';

// 4. Jalankan Mesin RON PHP
use App\Core\App;
App::run();