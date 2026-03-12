<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<?php App\Core\Flasher::flash(); ?>

<div style="display: flex; gap: 20px; flex-wrap: wrap; align-items: flex-start;">
    
    <div class="card" style="flex: 1; min-width: 300px; margin-bottom: 0;">
        <h3 style="border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 20px;">
            <i class="fa-solid fa-folder-plus text-gray-500"></i> Tambah Menu
        </h3>
        <form action="/menu/store" method="POST">
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Nama Menu</label>
                <input type="text" name="nama_menu" placeholder="Contoh: Laporan Penjualan" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">URL Route</label>
                <input type="text" name="url" placeholder="Contoh: /laporan" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Pilih Menu Induk</label>
                <select name="parent_id" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="" style="font-weight:bold; color:#3b82f6;">⭐ JADIKAN MENU INDUK (KIRI)</option>
                    <?php foreach ($menus as $m): ?>
                        <?php if (empty($m['parent_id']) && $m['tipe'] == 'sidebar'): ?>
                            <option value="<?= $m['id']; ?>">Anak dari: <?= $m['nama_menu']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>

            <div style="margin-bottom: 15px; display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Class Icon</label>
                    <input type="text" name="icon" placeholder="fa-chart-line" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div style="flex: 1;">
                    <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Urutan (Angka)</label>
                    <input type="number" name="urutan" value="0" placeholder="0" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
            </div>
            
            <div style="margin-bottom: 25px;">
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Tipe Menu</label>
                <select name="tipe" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="sidebar">Sidebar (Menu Kiri)</option>
                    <option value="aksi">Aksi (Tombol Khusus)</option>
                </select>
            </div>
            <button type="submit" class="btn" style="width: 100%;">💾 Simpan Menu</button>
        </form>
    </div>

    <div class="card" style="flex: 2; min-width: 450px; margin-bottom: 0;">
        <h3 style="border-bottom: 1px solid var(--border-color); padding-bottom: 15px; margin-bottom: 20px;">
            <i class="fa-solid fa-list text-gray-500"></i> Daftar Menu Sistem
        </h3>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50px; text-align:center;">NO</th>
                        <th>MENU</th>
                        <th>INDUK</th>
                        <th>URL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $m) : ?>
                        <tr>
                            <td style="text-align:center; font-weight:bold; color:var(--text-gray);"><?= $m['urutan']; ?></td>
                            <td>
                                <i class="fa-solid <?= $m['icon'] ?? 'fa-cube'; ?>" style="color: #94a3b8; width: 20px;"></i>
                                <strong style="color: var(--text-dark);"><?= $m['nama_menu']; ?></strong>
                            </td>
                            <td style="font-size: 12px; color: #64748b;">
                                <?= $m['nama_parent'] ? '↳ ' . $m['nama_parent'] : '<span style="color:#3b82f6; font-weight:bold;">Menu Induk</span>'; ?>
                            </td>
                            <td style="color: var(--ron-blue); font-family: monospace;"><?= $m['url']; ?></td>
                            <td class="aksi-buttons">
                                <a href="/menu/edit/<?= $m['id']; ?>" class="btn-sm" style="background:#f59e0b; color:white; text-decoration:none; margin-right: 4px;"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="/menu/delete/<?= $m['id']; ?>" class="btn-sm" style="background:#ef4444; color:white; text-decoration:none;" onclick="return confirm('Hapus menu ini?');"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>