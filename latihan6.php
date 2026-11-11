<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 6 - Form POST | Praktikum 7</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="header-card">
        <h1>Praktikum 7: Pemrograman Server-Side dengan PHP</h1>
        <div class="header-meta">
            <span>Nama: <strong>MARGENT OUWEN SITOMPUL</strong></span>
            <span>NIM: <strong>312510463</strong></span>
            <span>Mata Kuliah: <strong>Pemrograman Web</strong></span>
        </div>
    </div>

    <div class="nav-bar">
        <a href="index.php" class="nav-link">Home</a>
        <a href="latihan1.php" class="nav-link">Latihan 1</a>
        <a href="latihan2.php" class="nav-link">Latihan 2</a>
        <a href="latihan3.php" class="nav-link">Latihan 3</a>
        <a href="latihan4.php" class="nav-link">Latihan 4</a>
        <a href="latihan5.php" class="nav-link">Latihan 5</a>
        <a href="latihan6.php" class="nav-link active">Latihan 6</a>
        <a href="latihan7.php" class="nav-link">Latihan 7</a>
        <a href="mini_project.php" class="nav-link">Mini Project</a>
    </div>

    <div class="card">
        <h2 class="card-title">Latihan 6 — Memproses Form dengan POST</h2>
        <div class="alert alert-info">
            <strong>Keterangan:</strong> Metode POST mengirim data di dalam body HTTP request sehingga data tidak tampak pada URL. Output disanitasi menggunakan <code>htmlspecialchars()</code> untuk mencegah serangan Cross-Site Scripting (XSS).
        </div>

        <?php
        $feedbackHtml = "";
        $namaInput = "";
        $prodiInput = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $namaInput = trim($_POST["nama"] ?? "");
            $prodiInput = trim($_POST["prodi"] ?? "");

            if ($namaInput === "" || $prodiInput === "") {
                $feedbackHtml = '<div class="alert alert-error"><strong>Error:</strong> Semua kolom wajib diisi.</div>';
            } else {
                $feedbackHtml = '<div class="alert alert-success">'
                    . '<h3>Data Diterima dengan Aman:</h3>'
                    . '<p><strong>Nama:</strong> ' . htmlspecialchars($namaInput, ENT_QUOTES, "UTF-8") . '</p>'
                    . '<p><strong>Program Studi:</strong> ' . htmlspecialchars($prodiInput, ENT_QUOTES, "UTF-8") . '</p>'
                    . '</div>';
            }
        }
        ?>

        <?php echo $feedbackHtml; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input id="nama" name="nama" type="text" placeholder="Masukkan nama..." value="<?php echo htmlspecialchars($namaInput, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi:</label>
                <input id="prodi" name="prodi" type="text" placeholder="Misal: Teknik Informatika" value="<?php echo htmlspecialchars($prodiInput, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="btn-group">
                <button type="submit" name="kirim" class="btn btn-primary">Kirim Data (POST)</button>
                <!-- Eksperimen Mandiri 5: Tombol Reset Form pada sisi Client -->
                <button type="reset" class="btn btn-secondary">Reset Form (Client-Side)</button>
                <a href="latihan6.php" class="btn btn-secondary">Clear (Server-Side)</a>
            </div>
        </form>

        <div style="margin-top: 24px; font-size: 0.88rem; color: #475569; background: #f8fafc; padding: 12px; border-radius: 6px;">
            <strong>Uji Keamanan XSS / Karakter Khusus:</strong> Cobalah input nama dengan <code>&lt;b&gt;Budi&lt;/b&gt;</code> atau <code>"alert('test')"</code> untuk melihat bagaimana <code>htmlspecialchars()</code> menetralkan karakter berbahaya menjadi entitas HTML.
        </div>
    </div>

    <div class="footer">
        &copy; 2026 MARGENT OUWEN SITOMPUL (312510463) - Praktikum Pemrograman Web
    </div>
</div>
</body>
</html>

