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

    public function insertUser($data) {
        $this->db->query('INSERT INTO users (nama, email) VALUES (:nama, :email)');
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // FUNGSI UPDATE
    public function updateUser($id, $data) {
        $this->db->query('UPDATE users SET nama = :nama, email = :email WHERE id = :id');
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // FUNGSI DELETE
    public function deleteUser($id) {
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}