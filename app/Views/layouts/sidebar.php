<?php
use App\Models\MenuModel;
$menuModel = new MenuModel();
$role_id = $_SESSION['role_id'] ?? 0;
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Tarik data menu
$all_menus = $menuModel->getMenusByRole($role_id, 'sidebar');

$parents = [];
$children = [];
$active_parent_id = null;

// Pisahkan Induk dan Anak
foreach($all_menus as $menu) {
    if (empty($menu['parent_id'])) {
        $parents[$menu['id']] = $menu;
    } else {
        $children[$menu['parent_id']][] = $menu;
        // Deteksi menu mana yang sedang aktif berdasarkan URL
        if ($current_uri == $menu['url'] || (strpos($current_uri, $menu['url']) === 0 && $menu['url'] != '/')) {
             $active_parent_id = $menu['parent_id'];
        }
    }
}

// Fallback untuk dashboard
if ($current_uri == '/') {
    foreach($children as $pid => $child_list) {
        foreach($child_list as $c) {
            if ($c['url'] == '/') $active_parent_id = $pid;
        }
    }
}

// Jika masih kosong (misal baru login), set default ke Induk pertama
if (!$active_parent_id && !empty($parents)) {
    $active_parent_id = array_key_first($parents);
}
?>

<nav class="sidebar-thin">
    <div class="logo-box">
        <div class="ron-logo">RON</div>
    </div>
    
    <div class="icon-menu">
        <?php foreach($parents as $parent): ?>
            <?php 
                $is_active = ($parent['id'] == $active_parent_id) ? 'active' : ''; 
                // Jika icon induk diklik, otomatis arahkan ke URL anak pertamanya
                $link = isset($children[$parent['id']][0]) ? $children[$parent['id']][0]['url'] : '#';
            ?>
            <a href="<?= $link; ?>" class="icon-btn <?= $is_active; ?>" title="<?= $parent['nama_menu']; ?>">
                <i class="fa-solid <?= $parent['icon']; ?>"></i>
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
        <?= strtoupper($parents[$active_parent_id]['nama_menu'] ?? 'MENU'); ?>
    </div>
    <div class="wide-menu">
        <?php if(isset($children[$active_parent_id])): ?>
            <?php foreach($children[$active_parent_id] as $child): ?>
                <?php $active = ($current_uri == $child['url'] || (strpos($current_uri, $child['url']) === 0 && $child['url'] != '/')) ? 'active' : ''; ?>
                <a href="<?= $child['url']; ?>" class="wide-link <?= $active; ?>">
                    <i class="fa-solid <?= $child['icon']; ?>" style="margin-right:8px; opacity:0.6;"></i> <?= $child['nama_menu']; ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</nav>