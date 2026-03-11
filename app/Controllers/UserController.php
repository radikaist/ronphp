<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel; // Jangan lupa panggil Model-nya

class UserController extends Controller 
{
    public function detail($id)
    {
        // Panggil Model
        $model = new UserModel();
        
        // Tarik data 1 pengguna berdasarkan ID dari URL
        $user = $model->getUserById($id);

        // Jika user dengan ID tersebut tidak ada di database, lempar ke halaman 404
        if (!$user) {
            http_response_code(404);
            echo "<h1 style='text-align:center; margin-top:50px;'>404 - Pengguna Tidak Ditemukan!</h1>";
            echo "<div style='text-align:center;'><a href='/'>Kembali ke Beranda</a></div>";
            return;
        }

        // Siapkan data untuk dikirim ke View
        $data = [
            'judul' => 'Detail Profil: ' . $user['nama'],
            'user'  => $user // Mengirim array data user yang didapat dari database
        ];

        // Tampilkan halaman detail
        $this->view('users/detail', $data);
    }
}