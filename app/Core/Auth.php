<?php

namespace App\Core;

class Auth
{
    // Fungsi untuk mencegat pengguna yang belum login
    public static function check()
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['login_error'] = "Anda harus login terlebih dahulu!";
            header('Location: /login');
            exit;
        }
    }

    // Mengambil data user yang sedang login
    public static function user()
    {
        return isset($_SESSION['user_id']) ? $_SESSION : null;
    }
}