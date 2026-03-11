<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<div class="card">
    <h1>Beranda Dashboard 🚀</h1>
    <p><span class="badge">RON PHP 1.0 - Layouting System</span></p>
    <p><?= $pesan; ?></p>
    
    <hr style="border: 0; border-top: 1px solid #e7ecf1; margin: 20px 0;">

    <h3>👥 Data Pengguna</h3>
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
                        <a href="/user/<?= $user['id']; ?>" class="btn-sm">Lihat Profil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>