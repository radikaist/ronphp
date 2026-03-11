<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? 'RON PHP Dashboard'; ?></title>
    <style>
        /* --- TEMA GAYA SMARTADMIN / POWERADMIN --- */
        :root {
            --primary-color: #02689b; /* Biru Profesional */
            --header-bg: #2b3643; /* Dark Slate Khas Admin Template */
            --bg-body: #eef1f5; /* Abu-abu terang */
            --text-main: #333333;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body { 
            font-family: 'Open Sans', 'Segoe UI', Tahoma, sans-serif; 
            background-color: var(--bg-body); 
            color: var(--text-main); 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
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
        }
        header .logo { font-size: 1.4em; font-weight: 700; color: white; text-decoration: none; letter-spacing: 1px;}
        header .logo span { color: #3498db; }
        header .user-menu { font-size: 0.9em; color: #aeb2b7; }

        /* Main Container */
        main { flex: 1; padding: 30px 20px; max-width: 1000px; margin: 0 auto; width: 100%; }

        /* Komponen Card (Kartu) Khas SmartAdmin */
        .card { 
            background: #ffffff; 
            padding: 25px; 
            border-radius: 4px; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); 
            border-top: 3px solid var(--primary-color); /* Garis atas khas admin panel */
            margin-bottom: 20px;
        }

        h1, h2, h3 { color: #444; margin-bottom: 15px; font-weight: 600;}
        
        .badge { display: inline-block; padding: 4px 8px; background: #28a745; color: white; border-radius: 3px; font-size: 0.8em; font-weight: 600; margin-bottom: 15px;}
        .badge-warning { background: #ffc107; color: #333; }

        /* Tabel Data */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e7ecf1; }
        th { background-color: #fbfcfd; font-weight: 600; color: #666; text-transform: uppercase; font-size: 0.85em; letter-spacing: 0.5px;}
        tr:hover { background-color: #f9fafb; }

        /* Tombol */
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

    <main>