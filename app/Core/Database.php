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

    private $dbh; // Database Handler
    private $stmt; // Statement
    private $error;

    public function __construct()
    {
        // Set DSN (Data Source Name)
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        // Optimasi & Keamanan PDO
        $options = [
            PDO::ATTR_PERSISTENT => true, // Menjaga koneksi tetap hidup
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Mode error ketat
        ];

        // Coba koneksi ke MySQL
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            die("<div style='color:red; font-family:sans-serif; padding:20px;'><b>Koneksi RON PHP ke Database Gagal:</b><br> " . $this->error . "</div>");
        }
    }
}