<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserModel;
use App\Models\RoleModel; // Panggil mesin Role
use App\Core\Flasher;
use App\Core\Auth;

class UserController extends Controller 
{
    public function __construct() { Auth::check(); }

    public function detail($id) {
        $model = new UserModel();
        $user = $model->getUserById($id);
        if (!$user) {
            http_response_code(404);
            die("Pengguna Tidak Ditemukan!");
        }
        $this->view('users/detail', ['judul' => 'Detail Profil', 'user' => $user]);
    }

    // UPGRADE: Kirim data roles ke form tambah
    public function create() {
        $roleModel = new RoleModel();
        $this->view('users/create', [
            'judul' => 'Tambah Pengguna Baru',
            'roles' => $roleModel->getAllRoles()
        ]);
    }

    public function store() {
        $model = new UserModel();
        if ($model->insertUser($_POST) > 0) {
            Flasher::setFlash($_POST['nama'], 'ditambahkan', 'success');
            header('Location: /');
            exit;
        }
    }

    // UPGRADE: Kirim data roles ke form edit
    public function edit($id) {
        $model = new UserModel();
        $roleModel = new RoleModel();
        $this->view('users/edit', [
            'judul' => 'Edit Pengguna',
            'user'  => $model->getUserById($id),
            'roles' => $roleModel->getAllRoles()
        ]);
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