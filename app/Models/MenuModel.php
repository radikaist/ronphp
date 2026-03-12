<?php

namespace App\Models;
use App\Core\Database;

class MenuModel
{
    private $db;

    public function __construct() { $this->db = new Database(); }

    public function getMenusByRole($role_id, $tipe = 'sidebar') {
        $query = "SELECT m.* FROM menus m 
                  JOIN role_menu rm ON m.id = rm.menu_id 
                  WHERE rm.role_id = :role_id AND m.tipe = :tipe 
                  ORDER BY m.id ASC";
        $this->db->query($query);
        $this->db->bind(':role_id', $role_id);
        $this->db->bind(':tipe', $tipe);
        return $this->db->resultSet();
    }

    public function getAllMenus() {
        $this->db->query('SELECT * FROM menus ORDER BY tipe DESC, id ASC');
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

    // FUNGSI BARU: Ambil 1 data menu berdasarkan ID
    public function getMenuById($id) {
        $this->db->query('SELECT * FROM menus WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function insertMenu($data) {
        $this->db->query('INSERT INTO menus (nama_menu, url, icon, tipe) VALUES (:nama_menu, :url, :icon, :tipe)');
        $this->db->bind(':nama_menu', $data['nama_menu']);
        $this->db->bind(':url', $data['url']);
        $this->db->bind(':icon', $data['icon']);
        $this->db->bind(':tipe', $data['tipe']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // FUNGSI BARU: Update Menu
    public function updateMenu($id, $data) {
        $this->db->query('UPDATE menus SET nama_menu = :nama_menu, url = :url, icon = :icon, tipe = :tipe WHERE id = :id');
        $this->db->bind(':nama_menu', $data['nama_menu']);
        $this->db->bind(':url', $data['url']);
        $this->db->bind(':icon', $data['icon']);
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