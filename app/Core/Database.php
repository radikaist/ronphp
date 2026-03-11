<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("<div style='color:red; font-family:sans-serif; padding:20px;'><b>Koneksi RON PHP ke Database Gagal:</b><br> " . $e->getMessage() . "</div>");
        }
    }

    // Fungsi untuk menyiapkan Query SQL
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    // Fungsi untuk mengikat data (Mencegah SQL Injection)
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value): $type = PDO::PARAM_INT; break;
                case is_bool($value): $type = PDO::PARAM_BOOL; break;
                case is_null($value): $type = PDO::PARAM_NULL; break;
                default: $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Fungsi untuk mengeksekusi Query
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Fungsi untuk mengambil BANYAK data (Array Multidimensi)
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mengambil SATU baris data saja
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk menghitung baris yang terpengaruh (untuk Insert/Update/Delete)
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}