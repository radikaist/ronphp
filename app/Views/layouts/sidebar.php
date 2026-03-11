<nav class="sidebar-thin">
    <div class="logo-box">
        <div class="ron-logo">RON</div>
    </div>
    
    <div class="icon-menu">
        <a href="/" class="icon-btn active" title="Dashboard"><i class="fa-solid fa-house"></i></a>
        <a href="#" class="icon-btn" title="Aplikasi"><i class="fa-solid fa-border-all"></i></a>
        <a href="#" class="icon-btn" title="Komponen"><i class="fa-solid fa-puzzle-piece"></i></a>
        <a href="#" class="icon-btn" title="Teks"><i class="fa-solid fa-text-width"></i></a>
        <a href="/user/create" class="icon-btn" title="Tambah Data"><i class="fa-solid fa-list-ul"></i></a>
        <a href="#" class="icon-btn" title="Grafik"><i class="fa-solid fa-chart-simple"></i></a>
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
        <a href="/" class="wide-link active">Home</a>
        <a href="#" class="wide-link">Sales</a>
        <a href="#" class="wide-link">Analytics</a>
        <a href="#" class="wide-link">CRM</a>
        <a href="#" class="wide-link">Marketing</a>
        <a href="/user/create" class="wide-link">Tambah Pengguna</a>
        <a href="#" class="wide-link">Projects</a>
        <a href="#" class="wide-link">Finance</a>
    </div>
</nav>