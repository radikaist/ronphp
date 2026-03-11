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

    public function delete($id) {
        $model = new MenuModel();
        if ($model->deleteMenu($id) > 0) {
            Flasher::setFlash('Menu', 'dihapus', 'success');
            header('Location: /menu');
            exit;
        }
    }
}