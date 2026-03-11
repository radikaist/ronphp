<?php
namespace App\Controllers;
use App\Core\Controller;
use App\Models\UserModel;
use App\Core\Auth; // Panggil penjaga keamanan

class HomeController extends Controller 
{
    public function __construct() {
        Auth::check(); // Gembok pintu!
    }

    public function index() {
        $model = new UserModel();
        $dataUsers = $model->getAllUsers(); 
        $data = [
            'judul' => 'Halaman Utama RON PHP',
            'pesan' => 'Selamat datang kembali, ' . $_SESSION['user_nama'] . '! 🚀',
            'users' => $dataUsers
        ];
        $this->view('home/index', $data);
    }
}