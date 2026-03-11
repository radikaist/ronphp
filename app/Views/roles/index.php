<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap; gap: 10px;">
        <h3 style="margin: 0; display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-shield-halved text-gray-500"></i> Manajemen Role (Kunci Master)
        </h3>
        <a href="#" class="btn"><i class="fa-solid fa-plus" style="margin-right: 5px;"></i> Tambah Role</a>
    </div>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th style="width: 80px;">ID</th>
                    <th>NAMA ROLE</th>
                    <th style="width: 200px;">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role) : ?>
                    <tr>
                        <td style="color: var(--text-gray);">#<?= $role['id']; ?></td>
                        <td><strong style="color: var(--text-dark);"><?= $role['nama_role']; ?></strong></td>
                        <td class="aksi-buttons">
                            <a href="#" class="btn-sm" style="background:#10b981; color:white; text-decoration:none;"><i class="fa-solid fa-key"></i> Hak Akses</a>
                            <a href="#" class="btn-sm" style="background:#f59e0b; color:white; margin: 0 4px; text-decoration:none;"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <a href="#" class="btn-sm" style="background:#ef4444; color:white; text-decoration:none;"><i class="fa-solid fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>