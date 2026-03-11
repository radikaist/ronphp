<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;

class UserController extends Controller 
{
    public function detail($id)
    {
        $model = new UserModel();
        $user = $model->getUserById($id);

        if (!$user) {
            http_response_code(404);
            echo "<h1 style='text-align:center; margin-top:50px;'>404 - Pengguna Tidak Ditemukan!</h1>";
            echo "<div style='text-align:center;'><a href='/'>Kembali ke Beranda</a></div>";
            return;
        }

        $data = [
            'judul' => 'Detail Profil: ' . $user['nama'],
            'user'  => $user
        ];

        $this->view('users/detail', $data);
    }

    // METHOD BARU: Menampilkan Form Tambah
    public function create()
    {
        $data = [
            'judul' => 'Tambah Pengguna Baru'
        ];
        $this->view('users/create', $data);
    }

    // METHOD BARU: Memproses Data Form
    public function store()
    {
        $model = new UserModel();
        
        // Eksekusi fungsi insertUser dengan melempar data $_POST
        if ($model->insertUser($_POST) > 0) {
            // Jika berhasil disimpan, langsung tendang (redirect) kembali ke Beranda
            header('Location: /');
            exit;
        } else {
            // Jika gagal
            die("Gagal menyimpan data ke database.");
        }
    }
}