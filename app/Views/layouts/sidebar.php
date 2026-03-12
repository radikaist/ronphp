<?php
use App\Models\MenuModel;

$menuModel = new MenuModel();
$role_id = $_SESSION['role_id'] ?? 0; 
$current_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$all_menus = $menuModel->getMenusByRole($role_id, 'sidebar');

$parents = [];
$children = [];
$active_parent_id = null;

// PERBAIKAN: Variabel $menu diganti menjadi $sb_menu agar tidak bentrok
foreach($all_menus as $sb_menu) {
    if (empty($sb_menu['parent_id'])) {
        $parents[$sb_menu['id']] = $sb_menu;
    } else {
        $children[$sb_menu['parent_id']][] = $sb_menu;
        if ($current_uri == $sb_menu['url'] || (strpos($current_uri, $sb_menu['url']) === 0 && $sb_menu['url'] != '/')) {
             $active_parent_id = $sb_menu['parent_id'];
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

// Default ke Induk pertama jika masih kosong
if (!$active_parent_id && !empty($parents)) {
    $active_parent_id = array_key_first($parents);
}
?>

<nav class="sidebar-thin">
    <div class="logo-box">
        <div class="ron-logo">RON</div>
    </div>
    
    <div class="icon-menu">
        <?php foreach($parents as $sb_parent): ?>
            <?php 
                $is_active = ($sb_parent['id'] == $active_parent_id) ? 'active' : ''; 
                $link = isset($children[$sb_parent['id']][0]) ? $children[$sb_parent['id']][0]['url'] : '#';
            ?>
            <a href="<?= $link; ?>" class="icon-btn <?= $is_active; ?>" title="<?= $sb_parent['nama_menu']; ?>">
                <i class="fa-solid <?= $sb_parent['icon']; ?>"></i>
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
            <?php foreach($children[$active_parent_id] as $sb_child): ?>
                <?php $active = ($current_uri == $sb_child['url'] || (strpos($current_uri, $sb_child['url']) === 0 && $sb_child['url'] != '/')) ? 'active' : ''; ?>
                <a href="<?= $sb_child['url']; ?>" class="wide-link <?= $active; ?>">
                    <i class="fa-solid <?= $sb_child['icon']; ?>" style="margin-right:8px; opacity:0.6;"></i> <?= $sb_child['nama_menu']; ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</nav>