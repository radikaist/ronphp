<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h2 style="border-bottom: 1px solid #e7ecf1; padding-bottom: 15px; margin-bottom: 20px;">Tambah Pengguna 📝</h2>

    <form action="/user/store" method="POST">
        
        <div style="margin-bottom: 15px;">
            <label for="nama" style="display: block; font-weight: 600; margin-bottom: 5px; color: #555;">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required placeholder="Masukkan nama..." 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit;">
        </div>

        <div style="margin-bottom: 25px;">
            <label for="email" style="display: block; font-weight: 600; margin-bottom: 5px; color: #555;">Alamat Email</label>
            <input type="email" id="email" name="email" required placeholder="contoh@email.com" 
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit;">
        </div>

        <div style="text-align: right;">
            <a href="/" class="btn btn-secondary" style="margin-right: 10px;">Batal</a>
            <button type="submit" class="btn" style="cursor: pointer; font-family: inherit;">💾 Simpan Data</button>
        </div>

    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>