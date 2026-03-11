<?php

namespace App\Models;

use App\Core\Database;

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Fungsi untuk mengambil SEMUA data pengguna (Untuk Beranda)
    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }

    // FUNGSI BARU: Mengambil SATU data pengguna berdasarkan ID
    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id); // Mengikat ID untuk mencegah SQL Injection
        return $this->db->single(); // Gunakan single() karena hanya 1 baris data
    }
}