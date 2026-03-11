<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? 'RON PHP Dashboard'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --ron-blue: #3b82f6;
            --ron-light-blue: #eff6ff;
            --text-dark: #1e293b;
            --text-gray: #64748b;
            --border-color: #e2e8f0;
            --bg-body: #f8fafc;
            --sidebar-bg: #ffffff;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { font-family: 'Segoe UI', Tahoma, sans-serif; background: var(--bg-body); color: var(--text-dark); display: flex; height: 100vh; overflow: hidden; }

        .app-container { display: flex; width: 100%; height: 100%; }

        /* --- 1. SIDEBAR KIRI (TIPIS) --- */
        .sidebar-thin { width: 75px; min-width: 75px; background: var(--sidebar-bg); border-right: 1px solid var(--border-color); display: flex; flex-direction: column; align-items: center; z-index: 20; }
        .logo-box { height: 75px; display: flex; align-items: center; justify-content: center; width: 100%; border-bottom: 1px solid var(--border-color); }
        .ron-logo { font-size: 24px; font-weight: 900; font-style: italic; color: var(--ron-blue); letter-spacing: -1px; }

        .icon-menu { flex: 1; display: flex; flex-direction: column; align-items: center; padding-top: 15px; width: 100%; gap: 12px; overflow-y: auto;}
        .icon-btn { width: 46px; height: 46px; min-height: 46px; display: flex; justify-content: center; align-items: center; border-radius: 10px; color: var(--text-gray); font-size: 18px; text-decoration: none; transition: 0.2s; }
        .icon-btn:hover { color: var(--ron-blue); }
        .icon-btn.active { background: var(--ron-light-blue); color: var(--ron-blue); }

        .sidebar-bottom { padding-bottom: 25px; display: flex; flex-direction: column; align-items: center; gap: 18px; width: 100%; }
        .avatar-box img { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid transparent; transition: 0.3s; cursor: pointer;}
        .avatar-box img:hover { border-color: var(--ron-blue); }

        /* --- 2. SIDEBAR TENGAH (LEBAR) --- */
        .sidebar-wide { width: 220px; background: #fafbfc; border-right: 1px solid var(--border-color); display: flex; flex-direction: column; z-index: 10; transition: margin-left 0.3s ease; }
        /* Kelas pembantu untuk JavaScript Toggle */
        .sidebar-wide.hidden { margin-left: -220px; } 

        .wide-header { height: 75px; display: flex; align-items: center; justify-content: space-between; padding: 0 25px; font-weight: 700; font-size: 14px; letter-spacing: 0.5px; color: #111; border-bottom: 1px solid var(--border-color); }
        .wide-menu { padding: 15px; display: flex; flex-direction: column; gap: 5px; overflow-y: auto;}
        .wide-link { padding: 10px 15px; text-decoration: none; color: var(--text-gray); border-radius: 6px; font-size: 14.5px; transition: 0.2s; }
        .wide-link:hover { color: var(--ron-blue); }
        .wide-link.active { background: var(--ron-light-blue); color: var(--ron-blue); font-weight: 500; }

        /* --- 3. AREA KONTEN UTAMA --- */
        .main-content { flex: 1; display: flex; flex-direction: column; overflow-y: auto; overflow-x: hidden; }
        .topbar { height: 75px; min-height: 75px; background: #fff; border-bottom: 1px solid var(--border-color); display: flex; align-items: center; padding: 0 30px; color: var(--text-gray); font-size: 14px;}
        main { padding: 30px; flex: 1; max-width: 1200px; width: 100%; margin: 0 auto;}

        /* CSS Komponen */
        .card { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); border: 1px solid var(--border-color); margin-bottom: 20px; }
        .badge { background: #10b981; color: white; padding: 4px 10px; border-radius: 4px; font-size: 12px; font-weight: 600; }
        .btn { background: var(--ron-blue); color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; transition: 0.2s; border: none; display: inline-block;}
        .btn:hover { background: #2563eb; }
        .btn-sm { padding: 5px 10px; font-size: 12px; border-radius: 4px; }
        
        /* CSS Tabel Responsif */
        .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; width: 100%; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; min-width: 600px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid var(--border-color); font-size: 14px; }
        th { color: var(--text-gray); font-weight: 600; text-transform: uppercase; font-size: 12px; letter-spacing: 0.5px; background: #f8fafc;}
        tr:hover { background: #f1f5f9; }
        
        /* Mencegah tombol aksi bertumpuk */
        .aksi-buttons { white-space: nowrap; }

        /* Media Query untuk Layar HP / Tablet */
        @media (max-width: 768px) {
            .sidebar-wide { position: absolute; left: 75px; height: 100%; box-shadow: 4px 0 10px rgba(0,0,0,0.1); }
            /* Otomatis sembunyikan sidebar di HP */
            .sidebar-wide { margin-left: -220px; }
            .sidebar-wide.show-mobile { margin-left: 0; }
            .topbar { padding: 0 20px; }
            main { padding: 20px 15px; }
        }
    </style>
</head>
<body>
    
    <div class="app-container">
        
        <?php require_once __DIR__ . '/sidebar.php'; ?>

        <div class="main-content">
            
            <div class="topbar">
                <i class="fa-solid fa-bars" id="toggle-btn" style="margin-right: 15px; cursor: pointer; font-size: 18px; color: var(--ron-blue);"></i> 
                <strong>RON PHP Framework</strong> <span style="margin-left:5px; color:#94a3b8;">v1.0</span>
            </div>

            <main>