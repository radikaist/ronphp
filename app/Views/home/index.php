<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<?php App\Core\Flasher::flash(); ?>

<div class="card">
    <h2 style="border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 20px;">
        <i class="fa-solid fa-house text-gray-500"></i> Dashboard Utama
    </h2>
    
    <p style="font-size: 16px; color: var(--text-dark);">
        <?= $pesan; ?>
    </p>

    <div style="margin-top: 25px; padding: 15px; background: #eff6ff; border-left: 4px solid #3b82f6; border-radius: 4px;">
        <p style="margin: 0; color: #1e3a8a;">
            <strong>Informasi Sistem:</strong> Anda saat ini login dengan hak akses sebagai <strong><?= $_SESSION['role_id'] == 1 ? 'Super Admin' : 'User Spesifik'; ?></strong>. Gunakan menu di sebelah kiri untuk menavigasi aplikasi.
        </p>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>