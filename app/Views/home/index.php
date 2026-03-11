<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<?php App\Core\Flasher::flash(); ?>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <h3 style="margin: 0;">👥 Data Pengguna</h3>
        <a href="/user/create" class="btn">+ Tambah Pengguna</a>
    </div>
    
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
                    <td>#<?= $user['id']; ?></td>
                    <td><strong><?= $user['nama']; ?></strong></td>
                    <td><?= $user['email']; ?></td>
                    <td>
                        <a href="/user/<?= $user['id']; ?>" class="btn-sm" style="background:#0ea5e9; color:white;">Detail</a>
                        <a href="/user/edit/<?= $user['id']; ?>" class="btn-sm" style="background:#f59e0b; color:white; margin: 0 5px;">Edit</a>
                        
                        <a href="/user/delete/<?= $user['id']; ?>" class="btn-sm" style="background:#ef4444; color:white;" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>