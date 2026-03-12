<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 20px;">
        <i class="fa-solid fa-user-plus text-gray-500"></i> Tambah Pengguna
    </h2>

    <form action="/user/store" method="POST">
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: var(--text-gray); font-size: 13px;">Nama Lengkap</label>
            <input type="text" name="nama" required placeholder="Masukkan nama..." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: var(--text-gray); font-size: 13px;">Alamat Email</label>
            <input type="email" name="email" required placeholder="contoh@email.com" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: var(--text-gray); font-size: 13px;">Grup Hak Akses (Role)</label>
            <select name="role_id" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">-- Pilih Jabatan --</option>
                <?php foreach($roles as $role): ?>
                    <option value="<?= $role['id']; ?>"><?= $role['nama_role']; ?></option>
                <?php endforeach; ?>
            </select>
            <small style="color: #94a3b8; margin-top: 5px; display: block;">*Password default untuk pengguna baru adalah: <b>password123</b></small>
        </div>

        <div style="text-align: right;">
            <a href="/" class="btn btn-secondary" style="margin-right: 10px; background: #94a3b8;">Batal</a>
            <button type="submit" class="btn">💾 Simpan Data</button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>