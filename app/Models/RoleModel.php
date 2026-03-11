<?php

namespace App\Models;

use App\Core\Database;

class RoleModel
{
    private $db;

    public function __construct() { 
        $this->db = new Database(); 
    }

    // Mengambil semua daftar Role (Kunci Master)
    public function getAllRoles() {
        $this->db->query('SELECT * FROM roles');
        return $this->db->resultSet();
    }
}