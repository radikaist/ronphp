<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f8f9fa; color: #333; }
        .container { max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center;}
        h1 { color: #0d6efd; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-bottom: 20px;}
        .profile-box { background: #f1f8ff; border: 1px solid #cce5ff; padding: 20px; border-radius: 8px; margin-bottom: 20px; text-align: left;}
        .profile-box p { margin: 10px 0; font-size: 1.1em; border-bottom: 1px dashed #ccc; padding-bottom: 5px;}
        .profile-box strong { color: #0d6efd; display: inline-block; width: 80px;}
        a.btn { display: inline-block; padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px; transition: 0.3s;}
        a.btn:hover { background: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profil Pengguna 👤</h1>
        
        <div class="profile-box">
            <p><strong>ID</strong> : #<?= $user['id']; ?></p>
            <p><strong>Nama</strong> : <?= $user['nama']; ?></p>
            <p><strong>Email</strong> : <?= $user['email']; ?></p>
        </div>

        <a href="/" class="btn">⬅️ Kembali ke Beranda</a>
    </div>
</body>
</html>