<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database; // Panggil mesin Database

class HomeController extends Controller 
{
    public function index()
    {
        // TES KONEKSI: Jika gagal, aplikasi akan berhenti dan memunculkan error merah
        $db = new Database(); 

        // Jika berhasil lewat dari baris di atas, jalankan view
        $data = [
            'judul' => 'Halaman Utama RON PHP',
            'pesan' => 'Selamat datang di RON PHP. Koneksi Database MySQL BERHASIL! 🚀'
        ];

        $this->view('home/index', $data);
    }
}