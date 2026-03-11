<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel; // Panggil file UserModel

class HomeController extends Controller 
{
    public function index()
    {
        // 1. Panggil Model
        $model = new UserModel();
        
        // 2. Tarik data dari database
        $dataUsers = $model->getAllUsers(); 

        // 3. Siapkan data untuk dikirim ke View
        $data = [
            'judul' => 'Halaman Utama RON PHP',
            'pesan' => 'Selamat datang di RON PHP. Koneksi Database MySQL BERHASIL! 🚀',
            'users' => $dataUsers // Masukkan data hasil query ke sini
        ];

        // 4. Lempar ke tampilan HTML
        $this->view('home/index', $data);
    }
}