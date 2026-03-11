<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;

class AuthController extends Controller 
{
    // Menampilkan halaman Login
    public function index()
    {
        // Jika sudah login, langsung tendang ke Dashboard
        if (isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }
        $this->view('auth/login', ['judul' => 'Login - RON PHP']);
    }

    // Memproses data dari form login
    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $model = new UserModel();
        $user = $model->getUserByEmail($email);

        // Cek apakah email ada DAN password cocok dengan hash di database
        if ($user && password_verify($password, $user['password'])) {
            // Buat Kunci Session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nama'] = $user['nama'];
            $_SESSION['role_id'] = $user['role_id'];
            
            header('Location: /');
            exit;
        } else {
            $_SESSION['login_error'] = "Email atau Password salah!";
            header('Location: /login');
            exit;
        }
    }

    // Memproses Logout
    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}