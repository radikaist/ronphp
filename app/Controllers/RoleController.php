<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\RoleModel;
use App\Models\MenuModel;
use App\Core\Flasher;
use App\Core\Auth;

class RoleController extends Controller 
{
    public function __construct() { Auth::check(); }

    public function index() {
        $model = new RoleModel();
        $this->view('roles/index', [
            'judul' => 'Manajemen Role - RON PHP',
            'roles' => $model->getAllRoles()
        ]);
    }

    // MENAMPILKAN HALAMAN CHECKBOX HAK AKSES
    public function akses($id) {
        $roleModel = new RoleModel();
        $menuModel = new MenuModel();

        $data = [
            'judul'   => 'Atur Hak Akses',
            'role'    => $roleModel->getRoleById($id),
            'menus'   => $menuModel->getAllMenus(),
            'menu_id' => $menuModel->getMenuIdsByRole($id) // Data centangan saat ini
        ];

        $this->view('roles/akses', $data);
    }

    // MEMPROSES PENYIMPANAN HAK AKSES
    public function simpanAkses($id) {
        $roleModel = new RoleModel();
        // Tangkap array dari checkbox (jika kosong, jadikan array kosong)
        $menu_ids = $_POST['menus'] ?? []; 
        
        if ($roleModel->updateAkses($id, $menu_ids)) {
            Flasher::setFlash('Hak Akses', 'diperbarui', 'success');
            header('Location: /role');
            exit;
        }
    }
}