<?php

namespace App\Controllers;

use App\Core\Controller;

class UserController extends Controller 
{
    // Method ini sekarang bisa menerima variabel $id dari URL!
    public function detail($id)
    {
        $data = [
            'judul' => 'Detail Pengguna - RON PHP',
            'pesan' => "Kamu berhasil menangkap parameter dari URL!",
            'id_user' => $id // Menyimpan ID yang ditangkap
        ];

        $this->view('users/detail', $data);
    }
}