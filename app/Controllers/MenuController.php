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

        // --- LOGIKA PAGINATION ---
        $limit = 10; // Jumlah item per halaman
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        
        $offset = ($page - 1) * $limit; // Titik mulai data
        
        $total_data = $model->getTotalMenus();
        $total_pages = ceil($total_data / $limit); // Membulatkan ke atas (cth: 12 data / 10 = 2 halaman)

        $this->view('menus/index', [
            'judul'        => 'Manajemen Menu - RON PHP',
            'menus'        => $model->getAllMenusPaginated($limit, $offset), // Ambil 10 data saja
            'total_pages'  => $total_pages,
            'current_page' => $page,
            'start_number' => $offset + 1 // Agar nomor urut tabel tidak kembali ke 1 di halaman 2
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

    public function edit($id) {
        $model = new MenuModel();
        $menu = $model->getMenuById($id);
        if (!$menu) {
            http_response_code(404);
            die("Menu Tidak Ditemukan!");
        }
        $this->view('menus/edit', ['judul' => 'Edit Menu - RON PHP', 'menu' => $menu]);
    }

    public function update($id) {
        $model = new MenuModel();
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