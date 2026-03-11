<?php

namespace App\Models;
use App\Core\Database;

class UserModel
{
    private $db;

    public function __construct() { $this->db = new Database(); }

    public function getAllUsers() {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }

    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // FUNGSI BARU UNTUK LOGIN: Cari user berdasarkan Email
    public function getUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function insertUser($data) {
        // Enkripsi password default (password123) untuk user baru
        $password = password_hash('password123', PASSWORD_BCRYPT);
        
        $this->db->query('INSERT INTO users (nama, email, password, role_id) VALUES (:nama, :email, :password, 2)');
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $password);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateUser($id, $data) {
        $this->db->query('UPDATE users SET nama = :nama, email = :email WHERE id = :id');
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteUser($id) {
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}