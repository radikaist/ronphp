<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? 'RON PHP Dashboard'; ?></title>
    <style>
        /* --- TEMA LIGHT SMARTADMIN / POWERADMIN --- */
        :root {
            --primary-color: #02689b; 
            --header-bg: #2b3643; 
            --bg-body: #eef1f5; 
            --sidebar-bg: #ffffff; /* Sidebar Terang/Clean */
            --text-main: #333333;
            --text-muted: #888888;
            --border-color: #e7ecf1;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { 
            font-family: 'Open Sans', 'Segoe UI', Tahoma, sans-serif; 
            background-color: var(--bg-body); 
            color: var(--text-main); 
            display: flex; 
            flex-direction: column; 
            height: 100vh; /* Kunci agar sidebar & konten bisa di-scroll terpisah */
            overflow: hidden;
        }

        /* Top Navbar */
        header { 
            background: var(--header-bg); 
            color: white; 
            padding: 0 20px; 
            height: 60px;
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 10;
        }
        header .logo { font-size: 1.4em; font-weight: 700; color: white; text-decoration: none; letter-spacing: 1px;}
        header .logo span { color: #3498db; }
        header .user-menu { font-size: 0.9em; color: #aeb2b7; }

        /* Container Pembagi Layar (Kiri Sidebar, Kanan Konten) */
        .app-wrapper {
            display: flex;
            flex: 1;
            overflow: hidden;
        }

        /* Desain Sidebar Clean & Terang */
        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            overflow-y: auto;
            box-shadow: 1px 0 5px rgba(0,0,0,0.02);
        }
        .sidebar-menu { padding: 20px 0; }
        .menu-label { font-size: 0.75em; font-weight: 700; color: #a0a8b1; padding: 0 20px; margin-bottom: 10px; letter-spacing: 1px; }
        .nav-list { list-style: none; margin-bottom: 25px; }
        .nav-item { margin-bottom: 2px; }
        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #555;
            text-decoration: none;
            font-size: 0.95em;
            font-weight: 600;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }
        .nav-link .icon { margin-right: 12px; font-size: 1.1em; }
        .nav-link:hover { background: #f8f9fa; color: var(--primary-color); border-left-color: #cfdadd; }
        .nav-link.active { background: #f1f6f9; color: var(--primary-color); border-left-color: var(--primary-color); }
        .text-danger:hover { color: #dc3545 !important; border-left-color: #f5c6cb !important; background: #fdf3f4; }

        /* Area Kanan (Konten + Footer) */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        main { flex: 1; padding: 30px 20px; max-width: 1000px; margin: 0 auto; width: 100%; }

        /* Komponen Card */
        .card { 
            background: #ffffff; padding: 25px; border-radius: 4px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); 
            border-top: 3px solid var(--primary-color);
            margin-bottom: 20px;
        }

        h1, h2, h3 { color: #444; margin-bottom: 15px; font-weight: 600;}
        .badge { display: inline-block; padding: 4px 8px; background: #28a745; color: white; border-radius: 3px; font-size: 0.8em; font-weight: 600; margin-bottom: 15px;}
        .badge-warning { background: #ffc107; color: #333; }

        /* Tabel & Tombol */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid var(--border-color); }
        th { background-color: #fbfcfd; font-weight: 600; color: #666; text-transform: uppercase; font-size: 0.85em; letter-spacing: 0.5px;}
        tr:hover { background-color: #f9fafb; }

        a.btn, .btn-sm { display: inline-block; padding: 8px 15px; background: var(--primary-color); color: white; text-decoration: none; border-radius: 3px; transition: background 0.2s; font-size: 0.9em; border: none;}
        a.btn:hover, .btn-sm:hover { background: #014f76; }
        .btn-sm { padding: 5px 10px; font-size: 0.8em; }
        .btn-secondary { background: #6c757d; }
        .btn-secondary:hover { background: #5a6268; }
    </style>
</head>
<body>
    
    <header>
        <a href="/" class="logo">RON<span>PHP</span></a>
        <div class="user-menu">👤 Administrator</div>
    </header>

    <div class="app-wrapper">
        
        <?php require_once __DIR__ . '/sidebar.php'; ?>

        <div class="main-wrapper">
            <main>