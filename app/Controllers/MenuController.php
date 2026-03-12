<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\MenuModel;
use App\Core\Flasher;
use App\Core\Auth;

class MenuController extends Controller 
{
    public function __construct() { Auth::check(); }

    public function index() {
        $model = new MenuModel();
        $this->view('menus/index', [
            'judul' => 'Manajemen Menu - RON PHP',
            'menus' => $model->getAllMenus()
        ]);
    }

    public function store() {
        $model = new MenuModel();
        if ($model->insertMenu($_POST) > 0) {
            Flasher::setFlash($_POST['nama_menu'], 'ditambahkan', 'success');
            header('Location: /menu');
            exit;
        }
    }

    // FUNGSI BARU: Menampilkan Form Edit
    public function edit($id) {
        $model = new MenuModel();
        $menu = $model->getMenuById($id);

        if (!$menu) {
            http_response_code(404);
            die("Menu Tidak Ditemukan!");
        }

        $this->view('menus/edit', [
            'judul' => 'Edit Menu - RON PHP',
            'menu'  => $menu
        ]);
    }

    // FUNGSI BARU: Memproses Update Data
    public function update($id) {
        $model = new MenuModel();
        // Menggunakan >= 0 karena jika tidak ada yang dirubah, rowCount() mengembalikan 0
        if ($model->updateMenu($id, $_POST) >= 0) {
            Flasher::setFlash($_POST['nama_menu'], 'diperbarui', 'success');
            header('Location: /menu');
            exit;
        }
    }

    public function delete($id) {
        $model = new MenuModel();
        if ($model->deleteMenu($id) > 0) {
            Flasher::setFlash('Menu', 'dihapus', 'success');
            header('Location: /menu');
            exit;
        }
    }
}