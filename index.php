<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Megah Cyber Corp - Internal Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        :root {
            --bg-color: #020617;
            --card-bg: rgba(15, 23, 42, 0.6);
            --accent-primary: #3b82f6;
            --accent-secondary: #60a5fa;
            --text-main: #f8fafc;
            --text-dim: #94a3b8;
            --border-color: rgba(51, 65, 85, 0.5);
            --selection-bg: rgba(59, 130, 246, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        ::selection {
            background: var(--selection-bg);
            color: var(--accent-secondary);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            background-image: 
                radial-gradient(circle at 0% 0%, rgba(59, 130, 246, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 100% 100%, rgba(37, 99, 235, 0.03) 0%, transparent 50%);
            color: var(--text-main);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .container {
            max-width: 800px;
            width: 100%;
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            padding: 48px;
            border-radius: 32px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 64px rgba(0, 0, 0, 0.5);
        }

        .header {
            margin-bottom: 40px;
        }

        .brand-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--accent-primary);
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: var(--text-main);
            letter-spacing: -0.03em;
        }

        .subtitle {
            color: var(--text-dim);
            font-size: 1rem;
            max-width: 500px;
        }

        .news-grid {
            display: grid;
            gap: 24px;
        }

        .news-item {
            background: rgba(255, 255, 255, 0.02);
            padding: 28px;
            border-radius: 20px;
            border: 1px solid var(--border-color);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .news-item:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: var(--accent-primary);
            transform: translateY(-4px);
        }

        .news-item h3 {
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text-main);
        }

        .news-item h3 i {
            color: var(--accent-primary);
            font-size: 1.4rem;
        }

        .news-item p {
            color: var(--text-dim);
            font-size: 0.95rem;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .btn-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
            padding: 8px 0;
        }

        .btn-link:hover {
            color: var(--accent-secondary);
            gap: 12px;
        }

        .footer {
            margin-top: 48px;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
            font-size: 0.8rem;
            color: var(--text-dim);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 640px) {
            .container { padding: 32px; }
            h1 { font-size: 1.75rem; }
            .footer { flex-direction: column; gap: 12px; text-align: center; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="brand-tag">
            <i class="ph-bold ph-shield-check"></i> Akses Internal Terjamin
        </div>
        <h1>Megah Cyber Corp</h1>
        <p class="subtitle">Portal informasi karyawan. Harap gunakan kredensial Anda dengan bijak dan patuhi kebijakan keamanan perusahaan.</p>
    </div>

    <div class="news-grid">
        <div class="news-item">
            <h3><i class="ph ph-newspaper"></i> Pembaruan Sistem</h3>
            <p>Sistem manajemen profil baru telah diimplementasikan. Staf IT dapat melakukan verifikasi detail akun melalui direktori terpusat kami.</p>
            <a href="profile.php?id=2" class="btn-link">Lihat Direktori Karyawan <i class="ph ph-arrow-right"></i></a>
        </div>

        <div class="news-item">
            <h3><i class="ph ph-lock-key"></i> Protokol Keamanan</h3>
            <p>Akses ke <strong>Konsol Administratif</strong> sangat dibatasi hanya untuk personel manajemen resmi. Semua upaya akses dipantau secara ketat.</p>
            <a href="admin_panel.php" class="btn-link">Login <i class="ph ph-arrow-right"></i></a>
        </div>
    </div>

    <div class="footer">
        <span>&copy; 2026 Divisi IT Megah Cyber Corp</span>
        <span>Cabang Palopo • Node Aman 04</span>
    </div>
</div>

</body>
</html>