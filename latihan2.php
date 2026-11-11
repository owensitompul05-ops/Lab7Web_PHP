<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2 - Variabel, Operator & Percabangan | Praktikum 7</title>
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
        <a href="latihan2.php" class="nav-link active">Latihan 2</a>
        <a href="latihan3.php" class="nav-link">Latihan 3</a>
        <a href="latihan4.php" class="nav-link">Latihan 4</a>
        <a href="latihan5.php" class="nav-link">Latihan 5</a>
        <a href="latihan6.php" class="nav-link">Latihan 6</a>
        <a href="latihan7.php" class="nav-link">Latihan 7</a>
        <a href="mini_project.php" class="nav-link">Mini Project</a>
    </div>

    <div class="card">
        <h2 class="card-title">Latihan 2 — Variabel, Operator, dan Percabangan</h2>
        <p class="text-muted" style="margin-bottom: 16px;">
            Menghitung nilai akhir berbobot (Tugas 30%, UTS 30%, UAS 40%) beserta penentuan predikat kelulusan (A, B, C, D) serta penambahan <strong>Eksperimen Mandiri 1: Menghitung Nilai Rata-rata Tiga Komponen</strong>.
        </p>

        <?php
        // Data default sesuai modul atau dari input simulasi
        $nama = isset($_POST['nama']) ? trim($_POST['nama']) : "MARGENT OUWEN SITOMPUL";
        $tugas = isset($_POST['tugas']) ? (float)$_POST['tugas'] : 85;
        $uts = isset($_POST['uts']) ? (float)$_POST['uts'] : 78;
        $uas = isset($_POST['uas']) ? (float)$_POST['uas'] : 90;

        // Eksperimen Mandiri 1: Perhitungan nilai rata-rata dari tiga komponen nilai
        $rataRata = ($tugas + $uts + $uas) / 3;

        // Perhitungan nilai akhir berbobot sesuai modul
        $nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

        // Penentuan predikat
        if ($nilaiAkhir >= 85) {
            $predikat = "A";
            $badgeClass = "badge-a";
        } elseif ($nilaiAkhir >= 75) {
            $predikat = "B";
            $badgeClass = "badge-b";
        } elseif ($nilaiAkhir >= 60) {
            $predikat = "C";
            $badgeClass = "badge-c";
        } else {
            $predikat = "D";
            $badgeClass = "badge-d";
        }
        ?>

        <div class="alert alert-info">
            <h3 style="margin-bottom: 8px;">Hasil Perhitungan PHP:</h3>
            <p><strong>Nama:</strong> <?php echo htmlspecialchars($nama); ?></p>
            <p><strong>Nilai Komponen:</strong> Tugas = <?php echo $tugas; ?>, UTS = <?php echo $uts; ?>, UAS = <?php echo $uas; ?></p>
            <p><strong>Rata-rata Komponen (Eksperimen Mandiri 1):</strong> <?php echo number_format($rataRata, 2); ?></p>
            <p><strong>Nilai Akhir (30% Tugas + 30% UTS + 40% UAS):</strong> <?php echo number_format($nilaiAkhir, 2); ?></p>
            <p><strong>Predikat:</strong> <span class="badge <?php echo $badgeClass; ?>"><?php echo $predikat; ?></span></p>
        </div>

        <h3 class="card-title" style="margin-top: 24px;">Uji Kombinasi Nilai (Simulasi Form)</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama Mahasiswa:</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>
            </div>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px;">
                <div class="form-group">
                    <label for="tugas">Nilai Tugas (0-100):</label>
                    <input type="number" id="tugas" name="tugas" min="0" max="100" step="0.1" value="<?php echo $tugas; ?>" required>
                </div>
                <div class="form-group">
                    <label for="uts">Nilai UTS (0-100):</label>
                    <input type="number" id="uts" name="uts" min="0" max="100" step="0.1" value="<?php echo $uts; ?>" required>
                </div>
                <div class="form-group">
                    <label for="uas">Nilai UAS (0-100):</label>
                    <input type="number" id="uas" name="uas" min="0" max="100" step="0.1" value="<?php echo $uas; ?>" required>
                </div>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Hitung Nilai & Predikat</button>
                <a href="latihan2.php" class="btn btn-secondary">Reset ke Default</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; 2026 MARGENT OUWEN SITOMPUL (312510463) - Praktikum Pemrograman Web
    </div>
</div>
</body>
</html>

