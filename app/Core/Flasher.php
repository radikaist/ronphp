<?php

namespace App\Core;

class Flasher
{
    // Menyimpan pesan ke dalam Session
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe
        ];
    }

    // Menampilkan pesan lalu menghapusnya agar tidak muncul lagi saat di-refresh
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            $bg = $_SESSION['flash']['tipe'] == 'success' ? '#d1fae5' : '#fee2e2';
            $border = $_SESSION['flash']['tipe'] == 'success' ? '#10b981' : '#ef4444';
            $color = $_SESSION['flash']['tipe'] == 'success' ? '#065f46' : '#b91c1c';
            
            echo '<div style="padding: 12px 20px; margin-bottom: 20px; border-radius: 6px; background-color: '.$bg.'; color: '.$color.'; border: 1px solid '.$border.';">';
            echo 'Data Pengguna <strong>' . $_SESSION['flash']['pesan'] . '</strong> berhasil ' . $_SESSION['flash']['aksi'];
            echo '</div>';
            
            unset($_SESSION['flash']);
        }
    }
}