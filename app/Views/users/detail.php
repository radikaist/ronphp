<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f8f9fa; color: #333; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;}
        h1 { color: #0d6efd; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .badge { display: inline-block; padding: 5px 10px; background: #ffc107; color: #000; border-radius: 4px; font-size: 0.9em; margin-bottom: 15px; font-weight: bold;}
        .id-box { font-size: 3em; color: #198754; font-weight: bold; margin: 20px 0; }
        a.btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #0d6efd; color: white; text-decoration: none; border-radius: 5px; transition: 0.3s;}
        a.btn:hover { background: #0b5ed7; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profil Pengguna 👤</h1>
        <p><span class="badge">Fitur Rute Dinamis RON PHP Berhasil!</span></p>
        <p><?= $pesan; ?></p>
        
        <p>ID Pengguna yang sedang dilihat:</p>
        <div class="id-box">#<?= $id_user; ?></div>

        <a href="/" class="btn">⬅️ Kembali ke Beranda</a>
    </div>
</body>
</html>