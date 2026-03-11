<?php

namespace App\Models;
use App\Core\Database;

class RoleModel
{
    private $db;

    public function __construct() { $this->db = new Database(); }

    public function getAllRoles() {
        $this->db->query('SELECT * FROM roles');
        return $this->db->resultSet();
    }

    public function getRoleById($id) {
        $this->db->query('SELECT * FROM roles WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // FUNGSI MENYIMPAN CENTANGAN HAK AKSES BARU
    public function updateAkses($role_id, $menu_ids) {
        // 1. Hapus semua akses lama (Reset)
        $this->db->query('DELETE FROM role_menu WHERE role_id = :role_id');
        $this->db->bind(':role_id', $role_id);
        $this->db->execute();

        // 2. Masukkan akses baru jika ada yang dicentang
        if (!empty($menu_ids)) {
            foreach ($menu_ids as $menu_id) {
                $this->db->query('INSERT INTO role_menu (role_id, menu_id) VALUES (:role_id, :menu_id)');
                $this->db->bind(':role_id', $role_id);
                $this->db->bind(':menu_id', $menu_id);
                $this->db->execute();
            }
        }
        return true;
    }
}