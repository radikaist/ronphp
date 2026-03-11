<?php
// Panggil MenuModel
use App\Models\MenuModel;

$menuModel = new MenuModel();
// Ambil Role ID dari Session (default 0 jika belum ada)
$role_id = $_SESSION['role_id'] ?? 0; 
// Ambil URL yang sedang dibuka untuk efek menu aktif
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Tarik data menu dari database khusus untuk role ini
$menus = $menuModel->getMenusByRole($role_id, 'sidebar');
?>

<nav class="sidebar-thin">
    <div class="logo-box">
        <div class="ron-logo">RON</div>
    </div>
    
    <div class="icon-menu">
        <?php foreach($menus as $menu): ?>
            <?php $active = ($current_uri == $menu['url']) ? 'active' : ''; ?>
            <a href="<?= $menu['url']; ?>" class="icon-btn <?= $active; ?>" title="<?= $menu['nama_menu']; ?>">
                <i class="fa-solid <?= $menu['icon']; ?>"></i>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="sidebar-bottom">
        <a href="/logout" class="icon-btn" title="Keluar"><i class="fa-solid fa-power-off" style="color: #ef4444;"></i></a>
        <div class="avatar-box" title="<?= $_SESSION['user_nama'] ?? 'Guest'; ?>">
            <img src="https://ui-avatars.com/api/?name=<?= urlencode($_SESSION['user_nama'] ?? 'Guest'); ?>&background=3b82f6&color=fff&bold=true" alt="Avatar">
        </div>
    </div>
</nav>

<nav class="sidebar-wide">
    <div class="wide-header">
        DASHBOARDS
    </div>
    <div class="wide-menu">
        <?php foreach($menus as $menu): ?>
            <?php $active = ($current_uri == $menu['url']) ? 'active' : ''; ?>
            <a href="<?= $menu['url']; ?>" class="wide-link <?= $active; ?>"><?= $menu['nama_menu']; ?></a>
        <?php endforeach; ?>
    </div>
</nav>