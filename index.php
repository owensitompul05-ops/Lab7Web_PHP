<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Praktikum 7 - Pemrograman Server-Side PHP | MARGENT OUWEN SITOMPUL</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
            margin-top: 20px;
        }
        .portal-card {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: var(--radius);
            padding: 20px;
            transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .portal-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }
        .portal-card h3 {
            font-size: 1.1rem;
            color: #1e3a8a;
            margin-bottom: 8px;
        }
        .portal-card p {
            font-size: 0.88rem;
            color: var(--text-muted);
            margin-bottom: 16px;
            flex-grow: 1;
        }
        .status-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 12px;
            margin-top: 14px;
        }
        .status-item {
            background: #f1f5f9;
            padding: 12px;
            border-radius: 6px;
            font-size: 0.88rem;
        }
        .status-item span {
            display: block;
            color: #64748b;
            font-size: 0.78rem;
            text-transform: uppercase;
            font-weight: 600;
        }
        .status-item strong {
            color: #1e293b;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header-card">
        <h1>Praktikum 7: Pemrograman Server-Side dengan PHP</h1>
        <div class="header-meta">
            <span>Nama Mahasiswa: <strong>MARGENT OUWEN SITOMPUL</strong></span>
            <span>NIM: <strong>312510463</strong></span>
            <span>Mata Kuliah: <strong>Pemrograman Web</strong></span>
        </div>
    </div>

    <div class="nav-bar">
        <a href="index.php" class="nav-link active">Home</a>
        <a href="latihan1.php" class="nav-link">Latihan 1</a>
        <a href="latihan2.php" class="nav-link">Latihan 2</a>
        <a href="latihan3.php" class="nav-link">Latihan 3</a>
        <a href="latihan4.php" class="nav-link">Latihan 4</a>
        <a href="latihan5.php" class="nav-link">Latihan 5</a>
        <a href="latihan6.php" class="nav-link">Latihan 6</a>
        <a href="latihan7.php" class="nav-link">Latihan 7</a>
        <a href="mini_project.php" class="nav-link">Mini Project</a>
    </div>

    <!-- Info Server PHP -->
    <div class="card">
        <h2 class="card-title">Informasi Lingkungan Server</h2>
        <div class="status-grid">
            <div class="status-item">
                <span>Versi PHP</span>
                <strong><?php echo phpversion(); ?></strong>
            </div>
            <div class="status-item">
                <span>Waktu Server Saat Ini</span>
                <strong><?php echo date("d-m-Y H:i:s"); ?></strong>
            </div>
            <div class="status-item">
                <span>Server Software / CLI</span>
                <strong><?php echo htmlspecialchars($_SERVER['SERVER_SOFTWARE'] ?? 'PHP CLI Server', ENT_QUOTES, 'UTF-8'); ?></strong>
            </div>
            <div class="status-item">
                <span>Metode Request</span>
                <strong><?php echo htmlspecialchars($_SERVER['REQUEST_METHOD'] ?? 'GET', ENT_QUOTES, 'UTF-8'); ?></strong>
            </div>
        </div>
    </div>

    <!-- Daftar Modul & Latihan -->
    <div class="card">
        <h2 class="card-title">Daftar Modul Praktikum & Eksperimen Mandiri</h2>
        <div class="grid-cards">
            <!-- Latihan 1 -->
            <div class="portal-card">
                <div>
                    <h3>Latihan 1</h3>
                    <p>Menjalankan sintaks dasar PHP pada server lokal, menampilkan waktu sistem dan informasi dasar.</p>
                </div>
                <a href="latihan1.php" class="btn btn-primary" style="text-align: center;">Buka Latihan 1</a>
            </div>

            <!-- Latihan 2 -->
            <div class="portal-card">
                <div>
                    <h3>Latihan 2</h3>
                    <p>Penggunaan variabel, operator, percabangan predikat nilai, dan perhitungan rata-rata (Eksperimen 1).</p>
                </div>
                <a href="latihan2.php" class="btn btn-primary" style="text-align: center;">Buka Latihan 2</a>
            </div>

            <!-- Latihan 3 -->
            <div class="portal-card">
                <div>
                    <h3>Latihan 3</h3>
                    <p>Perulangan <code>foreach</code> dan array nama mahasiswa (dengan penambahan minimal 3 mahasiswa baru).</p>
                </div>
                <a href="latihan3.php" class="btn btn-primary" style="text-align: center;">Buka Latihan 3</a>
            </div>

            <!-- Latihan 4 -->
            <div class="portal-card">
                <div>
                    <h3>Latihan 4</h3>
                    <p>Pembuatan function diskon, format rupiah (Eksperimen 3), luas persegi panjang, dan status kelulusan.</p>
                </div>
                <a href="latihan4.php" class="btn btn-primary" style="text-align: center;">Buka Latihan 4</a>
            </div>

            <!-- Latihan 5 -->
            <div class="portal-card">
                <div>
                    <h3>Latihan 5</h3>
                    <p>Pemrosesan form dengan metode <code>GET</code> dan pencarian nama dalam array (Eksperimen 2).</p>
                </div>
                <a href="latihan5.php" class="btn btn-primary" style="text-align: center;">Buka Latihan 5</a>
            </div>

            <!-- Latihan 6 -->
            <div class="portal-card">
                <div>
                    <h3>Latihan 6</h3>
                    <p>Pemrosesan form dengan metode <code>POST</code> dan penerapan sanitasi <code>htmlspecialchars()</code>.</p>
                </div>
                <a href="latihan6.php" class="btn btn-primary" style="text-align: center;">Buka Latihan 6</a>
            </div>

            <!-- Latihan 7 -->
            <div class="portal-card">
                <div>
                    <h3>Latihan 7</h3>
                    <p>Pengolahan data transaksi kasir: nama barang, harga (desimal), kuantitas, validasi, dan subtotal.</p>
                </div>
                <a href="latihan7.php" class="btn btn-primary" style="text-align: center;">Buka Latihan 7</a>
            </div>

            <!-- Mini Project -->
            <div class="portal-card" style="border-color: #2563eb; background: #eff6ff;">
                <div>
                    <h3 style="color: #1d4ed8;">Mini Project: Form Mahasiswa</h3>
                    <p>Aplikasi formulir data mahasiswa lengkap dengan validasi NIM 9 digit, email, semester, dan tombol reset.</p>
                </div>
                <a href="mini_project.php" class="btn btn-primary" style="text-align: center;">Buka Mini Project</a>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; 2026 MARGENT OUWEN SITOMPUL (312510463) - Praktikum Pemrograman Web
    </div>
</div>
</body>
</html>

