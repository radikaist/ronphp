<?php

namespace App\Models;
use App\Core\Database;

class MenuModel
{
    private $db;
    public function __construct() { $this->db = new Database(); }

    public function getMenusByRole($role_id, $tipe = 'sidebar') {
        $query = "SELECT m.* FROM menus m JOIN role_menu rm ON m.id = rm.menu_id WHERE rm.role_id = :role_id AND m.tipe = :tipe ORDER BY m.urutan ASC, m.id ASC";
        $this->db->query($query);
        $this->db->bind(':role_id', $role_id);
        $this->db->bind(':tipe', $tipe);
        return $this->db->resultSet();
    }

    // PERBAIKAN: Mengubah ORDER BY agar memprioritaskan m1.urutan ASC paling awal
    public function getAllMenus() {
        $this->db->query('SELECT m1.*, m2.nama_menu as nama_parent FROM menus m1 LEFT JOIN menus m2 ON m1.parent_id = m2.id ORDER BY m1.urutan ASC, m1.id ASC');
        return $this->db->resultSet();
    }

    public function getMenuIdsByRole($role_id) {
        $this->db->query('SELECT menu_id FROM role_menu WHERE role_id = :role_id');
        $this->db->bind(':role_id', $role_id);
        $results = $this->db->resultSet();
        $ids = [];
        foreach($results as $row) { $ids[] = $row['menu_id']; }
        return $ids; 
    }

    public function getMenuById($id) {
        $this->db->query('SELECT * FROM menus WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function insertMenu($data) {
        $parent_id = empty($data['parent_id']) ? null : $data['parent_id'];
        $urutan = empty($data['urutan']) ? 0 : $data['urutan'];

        $this->db->query('INSERT INTO menus (parent_id, nama_menu, url, icon, urutan, tipe) VALUES (:parent_id, :nama_menu, :url, :icon, :urutan, :tipe)');
        $this->db->bind(':parent_id', $parent_id);
        $this->db->bind(':nama_menu', $data['nama_menu']);
        $this->db->bind(':url', $data['url']);
        $this->db->bind(':icon', $data['icon']);
        $this->db->bind(':urutan', $urutan);
        $this->db->bind(':tipe', $data['tipe']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateMenu($id, $data) {
        $parent_id = empty($data['parent_id']) ? null : $data['parent_id'];
        $urutan = isset($data['urutan']) && $data['urutan'] !== '' ? $data['urutan'] : 0;

        $this->db->query('UPDATE menus SET parent_id = :parent_id, nama_menu = :nama_menu, url = :url, icon = :icon, urutan = :urutan, tipe = :tipe WHERE id = :id');
        $this->db->bind(':parent_id', $parent_id);
        $this->db->bind(':nama_menu', $data['nama_menu']);
        $this->db->bind(':url', $data['url']);
        $this->db->bind(':icon', $data['icon']);
        $this->db->bind(':urutan', $urutan);
        $this->db->bind(':tipe', $data['tipe']);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteMenu($id) {
        $this->db->query('DELETE FROM role_menu WHERE menu_id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        $this->db->query('DELETE FROM menus WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}