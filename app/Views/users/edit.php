<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="border-bottom: 1px solid #e7ecf1; padding-bottom: 15px; margin-bottom: 20px;">Edit Pengguna ✏️</h2>

    <form action="/user/update/<?= $user['id']; ?>" method="POST">
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #555;">Nama Lengkap</label>
            <input type="text" name="nama" value="<?= $user['nama']; ?>" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #555;">Alamat Email</label>
            <input type="email" name="email" value="<?= $user['email']; ?>" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit;">
        </div>

        <div style="text-align: right;">
            <a href="/" class="btn btn-secondary" style="margin-right: 10px; background: #94a3b8;">Batal</a>
            <button type="submit" class="btn" style="cursor: pointer; font-family: inherit;">🔄 Update Data</button>
        </div>

    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>