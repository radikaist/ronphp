<?php

namespace App\Models;

use App\Core\Database;

class MenuModel
{
    private $db;

    public function __construct() { 
        $this->db = new Database(); 
    }

    // Mengambil daftar menu berdasarkan Kunci Master (Role ID)
    public function getMenusByRole($role_id, $tipe = 'sidebar') {
        // Query sakti untuk mengecek pintu mana saja yang kuncinya cocok
        $query = "SELECT m.* FROM menus m 
                  JOIN role_menu rm ON m.id = rm.menu_id 
                  WHERE rm.role_id = :role_id AND m.tipe = :tipe 
                  ORDER BY m.id ASC";
                  
        $this->db->query($query);
        $this->db->bind(':role_id', $role_id);
        $this->db->bind(':tipe', $tipe);
        
        return $this->db->resultSet();
    }
}