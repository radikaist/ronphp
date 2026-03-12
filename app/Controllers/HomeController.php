<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;

class HomeController extends Controller 
{
    public function __construct() {
        Auth::check(); 
    }

    public function index() {
        // Hanya mengirimkan data dasar untuk Dashboard
        $data = [
            'judul' => 'Dashboard - RON PHP',
            'pesan' => 'Selamat datang kembali, ' . $_SESSION['user_nama'] . '! 🚀'
        ];
        
        $this->view('home/index', $data);
    }
}