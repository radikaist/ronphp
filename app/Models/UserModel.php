<?php

namespace App\Models;

use App\Core\Database; // Panggil mesin database

class UserModel
{
    private $db;

    public function __construct()
    {
        // Hubungkan model ini dengan mesin database PDO
        $this->db = new Database();
    }

    // Fungsi untuk mengambil semua data dari tabel users
    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet(); // Ambil datanya sebagai Array
    }
}