<?php

namespace App\Controllers;

use App\Core\Controller; // Panggil Base Controller

class HomeController extends Controller // Wajib pakai "extends Controller"
{
    public function index()
    {
        // Siapkan data dinamis untuk dikirim ke halaman web
        $data = [
            'judul' => 'Halaman Utama RON PHP',
            'pesan' => 'Selamat datang di RON PHP (Radika Origin Native PHP).'
        ];

        // Panggil file view 'home/index' dan kirimkan datanya
        $this->view('home/index', $data);
    }
}