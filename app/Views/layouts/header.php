<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? 'RON PHP Dashboard'; ?></title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* --- TEMA DUAL SIDEBAR (LIGHT & CLEAN) --- */
        :root {
            --bg-body: #f8f9fa;
            --border-color: #e5e7eb;
            --primary-blue: #3b82f6; /* Biru terang khas premium admin */
            --primary-light: #eff6ff; /* Background biru sangat pudar untuk menu aktif */
            --text-dark: #1e293b;
            --text-muted: #64748b;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', system-ui, sans-serif; }
        
        body { 
            height: 100vh; 
            display: flex; 
            overflow: hidden; 
            background: var(--bg-body); 
            color: var(--text-dark); 
        }

        /* 1. SIDEBAR PALING KIRI (IKON SAJA) */
        .sidebar-primary {
            width: 72px;
            background: #ffffff;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px 0;
            z-index: 10;
        }
        .logo-icon { font-weight: 800; font-size: 22px; color: var(--primary-blue); text-decoration: none; font-style: italic; margin-bottom: 30px; letter-spacing: -1px; }
        .nav-icons { display: flex; flex-direction: column; gap: 8px; flex: 1; width: 100%; align-items: center; }
        .icon-item { width: 44px; height: 44px; display: flex; align-items: center; justify-content: center; border-radius: 8px; color: var(--text-muted); font-size: 22px; text-decoration: none; transition: 0.2s; }
        .icon-item:hover { color: var(--primary-blue); }
        .icon-item.active { background: var(--primary-light); color: var(--primary-blue); }
        
        /* Area Bawah Sidebar Kiri (Settings & Profile) */
        .bottom-icons { display: flex; flex-direction: column; gap: 15px; margin-top: auto; align-items: center; padding-top: 20px; border-top: 1px solid var(--border-color); width: 100%;}
        .avatar { width: 36px; height: 36px; border-radius: 50%; border: 2px solid var(--primary-blue); object-fit: cover;}

        /* 2. SIDEBAR KEDUA (TEKS SUB-MENU) */
        .sidebar-secondary {
            width: 240px;
            background: #ffffff;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            z-index: 9;
        }
        .sidebar-header { padding: 25px 20px 15px 20px; font-weight: 700; font-size: 13px; letter-spacing: 0.5px; color: #0f172a; }
        .sub-menu { list-style: none; padding: 0 12px; display: flex; flex-direction: column; gap: 4px; }
        .sub-link { display: block; padding: 10px 15px; border-radius: 6px; text-decoration: none; color: var(--text-muted); font-size: 14.5px; transition: 0.2s; }
        .sub-link:hover { color: var(--text-dark); background: #f8fafc; }
        .sub-link.active { background: var(--primary-light); color: var(--primary-blue); font-weight: 500; }

        /* 3. AREA KONTEN UTAMA */
        .main-content { 
            flex: 1; 
            display: flex; 
            flex-direction: column; 
            overflow-y: auto; 
            padding: 30px 40px; 
        }

        /* Update Desain Card & Komponen untuk menyesuaikan tema terang */
        .card { background: #ffffff; padding: 25px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid var(--border-color); margin-bottom: 20px; }
        h1, h2, h3 { color: #0f172a; font-weight: 600; margin-bottom: 15px; }
        .badge { display: inline-block; padding: 5px 10px; background: #10b981; color: white; border-radius: 4px; font-size: 12px; font-weight: 600; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 14px 15px; text-align: left; border-bottom: 1px solid var(--border-color); font-size: 14.5px;}
        th { color: var(--text-muted); font-weight: 600; text-transform: uppercase; font-size: 12px; letter-spacing: 0.5px; }
        tr:hover { background: #f8fafc; }

        .btn, .btn-sm { display: inline-block; padding: 8px 16px; background: var(--primary-blue); color: white; text-decoration: none; border-radius: 6px; font-size: 14px; border: none; font-weight: 500; cursor: pointer;}
        .btn:hover, .btn-sm:hover { background: #2563eb; }
        .btn-sm { padding: 6px 12px; font-size: 13px; }
        .btn-secondary { background: #64748b; }
        .btn-secondary:hover { background: #475569; }
    </style>
</head>
<body>
    
    <?php require_once __DIR__ . '/sidebar.php'; ?>

    <div class="main-content">