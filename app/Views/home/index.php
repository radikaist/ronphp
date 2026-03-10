<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f8f9fa; color: #333; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #0d6efd; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        p { line-height: 1.6; }
        .badge { display: inline-block; padding: 5px 10px; background: #198754; color: white; border-radius: 4px; font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tahap 3 Berhasil! 🎉</h1>
        <p><span class="badge">RON PHP 1.0</span></p>
        <p><?= $pesan; ?></p>
        <p>Sekarang Controller dan View (Tampilan HTML) sudah terpisah dengan sangat rapi dan dinamis.</p>
    </div>
</body>
</html>