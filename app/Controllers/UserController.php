<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;
use App\Core\Flasher; // Panggil alat Flasher

class UserController extends Controller
 
{
    public function __construct() {
        Auth::check(); // Gembok pintu!
    }
    public function detail($id) {
        $model = new UserModel();
        $user = $model->getUserById($id);
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
        }
    }

    // MENAMPILKAN FORM EDIT
    public function edit($id) {
        $model = new UserModel();
        $data = [
            'judul' => 'Edit Pengguna',
            'user'  => $model->getUserById($id)
        ];
        $this->view('users/edit', $data);
    }

    // MEMPROSES DATA UPDATE
    public function update($id) {
        $model = new UserModel();
        // Pakai >= 0 karena jika tidak ada yang dirubah, rowCount() mengembalikan 0
        if ($model->updateUser($id, $_POST) >= 0) {
            Flasher::setFlash($_POST['nama'], 'diperbarui', 'success');
            header('Location: /');
            exit;
        }
    }

    // MEMPROSES HAPUS DATA
    public function delete($id) {
        $model = new UserModel();
        if ($model->deleteUser($id) > 0) {
            Flasher::setFlash('ID #' . $id, 'dihapus', 'success');
            header('Location: /');
            exit;
        }
    }
}