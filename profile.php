<?php
include 'config.php';

$id = $_GET['id']; // VULNERABLE: Tidak ada sanitasi atau prepared statement
$query = "SELECT username, role FROM users WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Karyawan | Megah Cyber Corp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        :root {
            --bg-color: #020617;
            --card-bg: rgba(15, 23, 42, 0.6);
            --accent-primary: #3b82f6;
            --text-main: #f8fafc;
            --text-dim: #94a3b8;
            --border-color: rgba(51, 65, 85, 0.5);
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

        .profile-card {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            padding: 40px;
            border-radius: 24px;
            border: 1px solid var(--border-color);
            width: 100%;
            max-width: 440px;
            box-shadow: 0 4px 64px rgba(0, 0, 0, 0.5);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 32px;
        }

        .avatar-placeholder {
            width: 64px;
            height: 64px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-primary);
            font-size: 2rem;
        }

        h2 {
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.02em;
        }

        .info-list {
            display: grid;
            gap: 20px;
        }

        .info-group {
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .label {
            color: var(--text-dim);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .value {
            font-size: 1.05rem;
            font-weight: 500;
        }

        .back-link {
            color: var(--text-dim);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 32px;
            transition: all 0.2s;
        }

        .back-link:hover {
            color: var(--accent-primary);
            gap: 12px;
        }
    </style>
</head>
<body>
    <div class="profile-card">
        <div class="profile-header">
            <div class="avatar-placeholder">
                <i class="ph ph-user-focus"></i>
            </div>
            <div>
                <h2>Detail Karyawan</h2>
                <p style="color: var(--text-dim); font-size: 0.85rem;">Akses Direktori Internal</p>
            </div>
        </div>

        <div class="info-list">
            <?php if ($row): ?>
                <div class="info-group">
                    <div class="label">Nama Pengguna</div>
                    <div class="value"><?php echo $row['username']; ?></div>
                </div>
                <div class="info-group">
                    <div class="label">Peran Otorisasi</div>
                    <div class="value"><?php echo $row['role']; ?></div>
                </div>
            <?php else: ?>
                <p style="color: var(--text-dim);">Profil pengguna yang diminta tidak ditemukan dalam sistem.</p>
            <?php endif; ?>
        </div>
        
        <a href="index.php" class="back-link"><i class="ph ph-arrow-left"></i> Kembali ke Portal</a>
    </div>
</body>
</html>