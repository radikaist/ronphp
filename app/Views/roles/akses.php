<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <h3 style="border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 20px;">
        <i class="fa-solid fa-key text-gray-500"></i> Atur Hak Akses: <span style="color: var(--ron-blue);"><?= $role['nama_role']; ?></span>
    </h3>

    <form action="/role/simpanAkses/<?= $role['id']; ?>" method="POST">
        
        <p style="margin-bottom: 15px; font-size: 14px; color: var(--text-gray);">
            Centang fitur yang boleh diakses oleh grup ini:
        </p>

        <div style="background: #f8fafc; border: 1px solid var(--border-color); border-radius: 6px; padding: 15px; margin-bottom: 25px;">
            <?php foreach ($menus as $m) : ?>
                <label style="display: flex; align-items: center; margin-bottom: 12px; cursor: pointer; padding: 8px; border-radius: 4px; transition: 0.2s;" onmouseover="this.style.background='#eff6ff'" onmouseout="this.style.background='transparent'">
                    
                    <input type="checkbox" name="menus[]" value="<?= $m['id']; ?>" 
                           <?= in_array($m['id'], $menu_id) ? 'checked' : ''; ?>
                           style="width: 18px; height: 18px; margin-right: 12px; cursor: pointer;">
                    
                    <span style="font-weight: 500; font-size: 15px;">
                        <i class="fa-solid <?= $m['icon'] ?? 'fa-cube'; ?>" style="margin-right: 8px; color: #94a3b8; width: 16px;"></i> 
                        <?= $m['nama_menu']; ?>
                    </span>
                    
                    <span style="margin-left: auto; font-size: 11px; padding: 2px 6px; border-radius: 4px; background: <?= $m['tipe'] == 'sidebar' ? '#dbeafe; color: #1d4ed8;' : '#ffedd5; color: #c2410c;'; ?>">
                        <?= strtoupper($m['tipe']); ?>
                    </span>
                </label>
            <?php endforeach; ?>
        </div>

        <div style="text-align: right;">
            <a href="/role" class="btn btn-secondary" style="margin-right: 10px;">Batal</a>
            <button type="submit" class="btn">💾 Simpan Perubahan</button>
        </div>

    </form>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>