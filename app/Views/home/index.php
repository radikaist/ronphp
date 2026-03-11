<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f8f9fa; color: #333; }
        .container { max-width: 700px; margin: auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #0d6efd; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        p { line-height: 1.6; }
        .badge { display: inline-block; padding: 5px 10px; background: #198754; color: white; border-radius: 4px; font-size: 0.9em; margin-bottom: 15px; }
        
        /* CSS Untuk Tabel Database */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; color: #333; }
        tr:hover { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tahap 4 Berhasil! 🎉</h1>
        <p><span class="badge">RON PHP 1.0 - Full MVC</span></p>
        <p><?= $pesan; ?></p>
        
        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <h3>👥 Data Pengguna (Live dari Database)</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $user['email']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</body>
</html>