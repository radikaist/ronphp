<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<?php App\Core\Flasher::flash(); ?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap; gap: 10px;">
        <h3 style="margin: 0; display: flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-users text-gray-500"></i> Data Pengguna
        </h3>
        <a href="/user/create" class="btn"><i class="fa-solid fa-plus" style="margin-right: 5px;"></i> Tambah Pengguna</a>
    </div>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td style="color: var(--text-gray);">#<?= $user['id']; ?></td>
                        <td><strong style="color: var(--text-dark);"><?= $user['nama']; ?></strong></td>
                        <td><?= $user['email']; ?></td>
                        <td class="aksi-buttons">
                            <a href="/user/<?= $user['id']; ?>" class="btn-sm" style="background:#0ea5e9; color:white; text-decoration:none;"><i class="fa-solid fa-eye"></i> Detail</a>
                            <a href="/user/edit/<?= $user['id']; ?>" class="btn-sm" style="background:#f59e0b; color:white; margin: 0 4px; text-decoration:none;"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <a href="/user/delete/<?= $user['id']; ?>" class="btn-sm" style="background:#ef4444; color:white; text-decoration:none;" onclick="return confirm('Yakin ingin menghapus data ini?');"><i class="fa-solid fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>