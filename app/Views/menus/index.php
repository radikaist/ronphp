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
                <label style="display: block; font-size: 13px; font-weight: 600; color: var(--text-gray); margin-bottom: 5px;">Class Icon (FontAwesome)</label>
                <input type="text" name="icon" placeholder="Contoh: fa-chart-line" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
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
                        <th>MENU</th>
                        <th>URL</th>
                        <th>TIPE</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menus as $m) : ?>
                        <tr>
                            <td>
                                <i class="fa-solid <?= $m['icon'] ?? 'fa-cube'; ?>" style="color: #94a3b8; width: 20px;"></i>
                                <strong style="color: var(--text-dark);"><?= $m['nama_menu']; ?></strong>
                            </td>
                            <td style="color: var(--ron-blue); font-family: monospace;"><?= $m['url']; ?></td>
                            <td>
                                <span style="font-size: 11px; padding: 4px 8px; border-radius: 4px; background: <?= $m['tipe'] == 'sidebar' ? '#dbeafe; color: #1d4ed8;' : '#ffedd5; color: #c2410c;'; ?>">
                                    <?= strtoupper($m['tipe']); ?>
                                </span>
                            </td>
                            <td>
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