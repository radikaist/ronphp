<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, sans-serif; }
        body { background-color: #f8fafc; display: flex; justify-content: center; align-items: center; height: 100vh; color: #333; }
        .login-card { background: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); width: 100%; max-width: 400px; border-top: 4px solid #3b82f6;}
        .logo-text { text-align: center; font-size: 28px; font-weight: 900; font-style: italic; color: #3b82f6; margin-bottom: 25px; letter-spacing: -1px; }
        .input-group { margin-bottom: 20px; }
        .input-group label { display: block; font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 8px; }
        .input-group input { width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 14px; outline: none; transition: 0.2s;}
        .input-group input:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px #eff6ff; }
        .btn-login { width: 100%; padding: 12px; background: #3b82f6; color: white; border: none; border-radius: 6px; font-size: 15px; font-weight: 600; cursor: pointer; transition: 0.2s;}
        .btn-login:hover { background: #2563eb; }
        .alert-error { background: #fee2e2; color: #b91c1c; padding: 12px; border-radius: 6px; font-size: 13px; margin-bottom: 20px; text-align: center; border: 1px solid #f87171;}
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo-text">RON PHP</div>
        
        <?php if(isset($_SESSION['login_error'])): ?>
            <div class="alert-error"><?= $_SESSION['login_error']; ?></div>
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>

        <form action="/login" method="POST">
            <div class="input-group">
                <label>Alamat Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" required>
            </div>
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-login">Masuk ke Dashboard</button>
        </form>
    </div>
</body>
</html>