<?php

namespace App\Models;
use App\Core\Database;

class UserModel
{
    private $db;

    public function __construct() { $this->db = new Database(); }

    // UPGRADE: Join dengan tabel roles agar nama jabatannya muncul
    public function getAllUsers() {
        $this->db->query('SELECT users.*, roles.nama_role FROM users LEFT JOIN roles ON users.role_id = roles.id ORDER BY users.id ASC');
        return $this->db->resultSet();
    }

    public function getUserById($id) {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    // UPGRADE: Tangkap role_id dari form
    public function insertUser($data) {
        $password = password_hash('password123', PASSWORD_BCRYPT); // Password default
        
        $this->db->query('INSERT INTO users (nama, email, password, role_id) VALUES (:nama, :email, :password, :role_id)');
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $password);
        $this->db->bind(':role_id', $data['role_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // UPGRADE: Update role_id dari form
    public function updateUser($id, $data) {
        $this->db->query('UPDATE users SET nama = :nama, email = :email, role_id = :role_id WHERE id = :id');
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':role_id', $data['role_id']);
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