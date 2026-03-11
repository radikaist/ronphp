<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;
use App\Core\Flasher;
use App\Core\Auth; // <-- INI DIA KUNCI YANG HILANG!

class UserController extends Controller 
{
    // GEMBOK PINTU: Hanya yang sudah login yang bisa mengakses semua fungsi di bawah ini
    public function __construct() {
        Auth::check(); 
    }

    public function detail($id) {
        $model = new UserModel();
        $user = $model->getUserById($id);

        if (!$user) {
            http_response_code(404);
            echo "<h1 style='text-align:center; margin-top:50px;'>404 - Pengguna Tidak Ditemukan!</h1>";
            echo "<div style='text-align:center;'><a href='/'>Kembali ke Beranda</a></div>";
            return;
        }

        $this->view('users/detail', ['judul' => 'Detail Profil', 'user' => $user]);
    }

    public function create() {
        $this->view('users/create', ['judul' => 'Tambah Pengguna Baru']);
    }

    public function store() {
        $model = new UserModel();
        if ($model->insertUser($_POST) > 0) {
            Flasher::setFlash($_POST['nama'], 'ditambahkan', 'success');
            header('Location: /');
            exit;
        } else {
            die("Gagal menyimpan data ke database.");
        }
    }

    public function edit($id) {
        $model = new UserModel();
        $data = [
            'judul' => 'Edit Pengguna',
            'user'  => $model->getUserById($id)
        ];
        $this->view('users/edit', $data);
    }

    public function update($id) {
        $model = new UserModel();
        if ($model->updateUser($id, $_POST) >= 0) {
            Flasher::setFlash($_POST['nama'], 'diperbarui', 'success');
            header('Location: /');
            exit;
        }
    }

    public function delete($id) {
        $model = new UserModel();
        if ($model->deleteUser($id) > 0) {
            Flasher::setFlash('ID #' . $id, 'dihapus', 'success');
            header('Location: /');
            exit;
        }
    }
}