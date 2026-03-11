<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\RoleModel;
use App\Core\Auth;

class RoleController extends Controller 
{
    public function __construct() {
        Auth::check(); // Gembok keamanan
    }

    public function index() {
        $model = new RoleModel();
        
        $data = [
            'judul' => 'Manajemen Role - RON PHP',
            'roles' => $model->getAllRoles()
        ];

        // Tampilkan ke halaman view
        $this->view('roles/index', $data);
    }
}