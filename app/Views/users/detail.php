<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="text-align: center; border-bottom: 1px solid #e7ecf1; padding-bottom: 15px;">Profil Pengguna 👤</h2>
    
    <div style="text-align: center; margin: 15px 0;">
        <span class="badge badge-warning">Rute Dinamis Aktif</span>
    </div>
    
    <div style="background: #f8f9fa; border: 1px solid #e7ecf1; padding: 20px; border-radius: 4px; margin-bottom: 25px;">
        <p style="margin: 10px 0; border-bottom: 1px dashed #ccc; padding-bottom: 8px;">
            <strong style="color: var(--primary-color); display: inline-block; width: 80px;">ID</strong> : #<?= $user['id']; ?>
        </p>
        <p style="margin: 10px 0; border-bottom: 1px dashed #ccc; padding-bottom: 8px;">
            <strong style="color: var(--primary-color); display: inline-block; width: 80px;">Nama</strong> : <?= $user['nama']; ?>
        </p>
        <p style="margin: 10px 0;">
            <strong style="color: var(--primary-color); display: inline-block; width: 80px;">Email</strong> : <?= $user['email']; ?>
        </p>
    </div>

    <div style="text-align: center;">
        <a href="/" class="btn btn-secondary">⬅️ Kembali ke Beranda</a>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>