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

    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // FUNGSI BARU: Menyimpan data ke tabel
    public function insertUser($data)
    {
        $this->db->query('INSERT INTO users (nama, email) VALUES (:nama, :email)');
        
        // Bind data dari form untuk mencegah SQL Injection
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        
        $this->db->execute();
        
        return $this->db->rowCount(); // Mengembalikan angka 1 jika berhasil
    }
}