<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h3 style="border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 20px;">
        <i class="fa-solid fa-pen-to-square text-gray-500"></i> Edit Menu Sistem
    </h3>

    <form action="/menu/update/<?= $menu['id']; ?>" method="POST">
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Nama Menu</label>
            <input type="text" name="nama_menu" value="<?= $menu['nama_menu']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">URL Route</label>
            <input type="text" name="url" value="<?= $menu['url']; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Pilih Menu Induk</label>
            <?php
                $db = new \App\Core\Database();
                $db->query("SELECT * FROM menus WHERE parent_id IS NULL AND tipe='sidebar'");
                $induks = $db->resultSet();
            ?>
            <select name="parent_id" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="" style="font-weight:bold; color:#3b82f6;">⭐ JADIKAN MENU INDUK (KIRI)</option>
                <?php foreach ($induks as $induk): ?>
                    <?php if($induk['id'] != $menu['id']): ?>
                        <option value="<?= $induk['id']; ?>" <?= ($menu['parent_id'] == $induk['id']) ? 'selected' : ''; ?>>
                            Anak dari: <?= $induk['nama_menu']; ?>
                        </option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="margin-bottom: 15px; display: flex; gap: 10px;">
            <div style="flex: 1;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Class Icon</label>
                <input type="text" name="icon" value="<?= $menu['icon']; ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="flex: 1;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Urutan (Angka)</label>
                <input type="number" name="urutan" value="<?= $menu['urutan']; ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
        </div>
        
        <div style="margin-bottom: 25px;">
            <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Tipe Menu</label>
            <select name="tipe" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="sidebar" <?= $menu['tipe'] == 'sidebar' ? 'selected' : ''; ?>>Sidebar (Menu Kiri)</option>
                <option value="aksi" <?= $menu['tipe'] == 'aksi' ? 'selected' : ''; ?>>Aksi (Tombol Khusus)</option>
            </select>
        </div>
        
        <div style="text-align: right;">
            <a href="/menu" class="btn btn-secondary" style="margin-right: 10px; background: #94a3b8;">Batal</a>
            <button type="submit" class="btn">🔄 Update Menu</button>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>