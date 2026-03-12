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
                <?php
                    $db = new \App\Core\Database();
                    $db->query("SELECT * FROM menus WHERE parent_id IS NULL AND tipe='sidebar' ORDER BY urutan ASC");
                    $induks = $db->resultSet();
                ?>
                <select name="parent_id" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                    <option value="" style="font-weight:bold; color:#3b82f6;">⭐ JADIKAN MENU INDUK (KIRI)</option>
                    <?php foreach ($induks as $induk): ?>
                        <option value="<?= $induk['id']; ?>">Anak dari: <?= $induk['nama_menu']; ?></option>
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
                        <th style="width: 40px; text-align:center;">NO</th>
                        <th style="width: 70px; text-align:center;">URUTAN</th>
                        <th>MENU</th>
                        <th>INDUK</th>
                        <th>URL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = $start_number; foreach ($menus as $m) : ?>
                        <tr>
                            <td style="text-align:center; color:#94a3b8; font-size: 13px;"><?= $no++; ?></td>
                            <td style="text-align:center;">
                                <span style="background: #eff6ff; color: #3b82f6; padding: 3px 8px; border-radius: 12px; font-size: 11px; font-weight: bold; border: 1px solid #bfdbfe;">
                                    <?= $m['urutan']; ?>
                                </span>
                            </td>
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

        <?php if(isset($total_pages) && $total_pages > 1): ?>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; border-top: 1px solid var(--border-color); padding-top: 15px;">
            <div style="font-size: 13px; color: var(--text-gray);">
                Halaman <strong><?= $current_page; ?></strong> dari <strong><?= $total_pages; ?></strong>
            </div>
            
            <div style="display: flex; gap: 5px;">
                <?php if ($current_page > 1): ?>
                    <a href="?page=<?= $current_page - 1; ?>" class="btn-sm" style="background: #f1f5f9; color: var(--text-dark); text-decoration: none; border: 1px solid #cbd5e1;">&laquo; Prev</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?= $i; ?>" class="btn-sm" style="background: <?= $i == $current_page ? 'var(--ron-blue)' : '#f1f5f9'; ?>; color: <?= $i == $current_page ? '#fff' : 'var(--text-dark)'; ?>; text-decoration: none; border: 1px solid <?= $i == $current_page ? 'var(--ron-blue)' : '#cbd5e1'; ?>; padding: 5px 12px;">
                        <?= $i; ?>
                    </a>
                <?php endfor; ?> <?php if ($current_page < $total_pages): ?>
                    <a href="?page=<?= $current_page + 1; ?>" class="btn-sm" style="background: #f1f5f9; color: var(--text-dark); text-decoration: none; border: 1px solid #cbd5e1;">Next &raquo;</a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>