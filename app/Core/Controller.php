<?php

namespace App\Core;

class Controller
{
    // Method untuk memanggil file view dan mengirimkan data
    public function view($view, $data = [])
    {
        // Ekstrak array menjadi variabel (misal: ['nama' => 'Radika'] menjadi $nama)
        if (!empty($data)) {
            extract($data);
        }

        // Cek apakah file view tersedia
        $viewFile = __DIR__ . '/../Views/' . $view . '.php';
        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            die("Error: File View '$view' tidak ditemukan di RON PHP!");
        }
    }
}