<?php
include 'config.php';
// Simulasi login sederhana
$status = "";
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username='$user' AND password='$pass' AND role='admin'";
    $res = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($res) > 0) {
        $_SESSION['admin'] = true;
    } else {
        $status = "Login Gagal!";
    }
}

// Fitur Upload yang rentan
if (isset($_POST['upload'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    
    // VULNERABLE: Hanya mengecek tipe file secara lemah, bukan ekstensi sebenarnya
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $status = "File berhasil diunggah ke: " . $target_file;
    } else {
        $status = "Gagal mengunggah file.";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console | Megah Cyber Corp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        :root {
            --bg-color: #020617;
            --card-bg: rgba(15, 23, 42, 0.6);
            --accent-primary: #3b82f6;
            --accent-danger: #ef4444;
            --accent-success: #10b981;
            --text-main: #f8fafc;
            --text-dim: #94a3b8;
            --border-color: rgba(51, 65, 85, 0.5);
            --input-bg: rgba(15, 23, 42, 0.8);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 24px;
        }

        .admin-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            padding: 48px;
            border-radius: 32px;
            border: 1px solid var(--border-color);
            width: 100%;
            max-width: 480px;
            box-shadow: 0 4px 64px rgba(0, 0, 0, 0.5);
        }

        .admin-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .icon-box {
            width: 56px;
            height: 56px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-primary);
            font-size: 1.75rem;
            margin: 0 auto 16px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-dim);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            color: var(--text-main);
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .file-input-wrapper {
            position: relative;
            margin-bottom: 20px;
        }

        input[type="file"] {
            width: 100%;
            padding: 12px;
            background: var(--input-bg);
            border: 1px dashed var(--border-color);
            border-radius: 12px;
            color: var(--text-dim);
            cursor: pointer;
        }

        input[type="submit"] {
            width: 100%;
            padding: 14px;
            background: var(--accent-primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        input[type="submit"]:hover {
            filter: brightness(1.1);
            transform: translateY(-1px);
        }

        .status-box {
            margin-top: 24px;
            padding: 14px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(239, 68, 68, 0.1);
            color: var(--accent-danger);
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .status-box.success {
            background: rgba(16, 185, 129, 0.1);
            color: var(--accent-success);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .nav-footer {
            margin-top: 32px;
            text-align: center;
        }

        .nav-link {
            color: var(--text-dim);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: var(--text-main);
        }
    </style>
</head>
<body>
    <div class="admin-card">
        <div class="admin-header">
            <div class="icon-box">
                <i class="ph-bold ph-keyhole"></i>
            </div>
            <h2>Konsol Admin</h2>
            <p style="color: var(--text-dim); font-size: 0.85rem;">Hanya untuk Personel Resmi</p>
        </div>
        
        <?php if (!isset($_SESSION['admin'])): ?>
            <form method="post">
                <div class="form-group">
                    <label>Nama Pengguna</label>
                    <input type="text" name="username" placeholder="ID Karyawan" required>
                </div>
                <div class="form-group">
                    <label>Kunci Akses</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                <input type="submit" name="login" value="Autentikasi">
            </form>
        <?php else: ?>
            <div style="text-align: center; margin-bottom: 24px;">
                <h3 style="color: var(--accent-success); font-size: 1.1rem; margin-bottom: 8px;">Autentikasi Terverifikasi</h3>
                <p style="color: var(--text-dim); font-size: 0.9rem;">Sistem Deployment: Siap</p>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Payload Konfigurasi</label>
                    <input type="file" name="fileToUpload">
                </div>
                <input type="submit" value="Deploy Paket" name="upload">
            </form>
        <?php endif; ?>

        <?php if ($status): ?>
            <div class="status-box <?php echo (strpos($status, 'berhasil') !== false) ? 'success' : ''; ?>">
                <i class="ph-bold <?php echo (strpos($status, 'berhasil') !== false) ? 'ph-check-circle' : 'ph-warning-circle'; ?>"></i>
                <?php echo $status; ?>
            </div>
        <?php endif; ?>

        <div class="nav-footer">
            <a href="index.php" class="nav-link"><i class="ph ph-house"></i> Kembali ke Portal</a>
        </div>
    </div>
</body>