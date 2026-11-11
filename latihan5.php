<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 5 - Form GET & Pencarian | Praktikum 7</title>
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
        <a href="latihan5.php" class="nav-link active">Latihan 5</a>
        <a href="latihan6.php" class="nav-link">Latihan 6</a>
        <a href="latihan7.php" class="nav-link">Latihan 7</a>
        <a href="mini_project.php" class="nav-link">Mini Project</a>
    </div>

    <div class="card">
        <h2 class="card-title">Latihan 5 — Memproses Form dengan GET</h2>
        <div class="alert alert-info">
            <strong>Catatan & Eksperimen Mandiri 2:</strong>
            Metode GET mengirimkan data parameter langsung melalui URL (query string).
            Sesuai <em>Eksperimen Mandiri 2</em>, form ini telah dikembangkan untuk mencari kecocokan nama dari array data mahasiswa.
        </div>

        <form method="GET" action="">
            <div class="form-group">
                <label for="kata">Masukkan Kata Kunci Pencarian Nama:</label>
                <div style="display: flex; gap: 8px;">
                    <input id="kata" name="kata" type="text" placeholder="Contoh: Margent, alya, sitompul..." value="<?php echo isset($_GET['kata']) ? htmlspecialchars($_GET['kata'], ENT_QUOTES, 'UTF-8') : ''; ?>">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="latihan5.php" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

        <?php
        // Database array sederhana untuk pencarian (Eksperimen Mandiri 2)
        $dataMahasiswa = [
            "Alya",
            "Bima",
            "Citra",
            "Doni",
            "MARGENT OUWEN SITOMPUL",
            "Eka Ramadhan",
            "Fiona Lestari",
            "Gandi Wijaya",
            "Hendra Kusuma"
        ];

        if (isset($_GET["kata"])) {
            $kata = trim($_GET["kata"]);
            $kataAman = htmlspecialchars($kata, ENT_QUOTES, "UTF-8");

            echo "<div style='margin-top: 20px;'>";
            echo "<p><strong>Kata kunci dicari:</strong> <code>" . ($kataAman !== "" ? $kataAman : "[Semua Data / Kosong]") . "</code></p>";

            // Filter array berdasarkan kecocokan string
            $hasilCari = [];
            if ($kata !== "") {
                foreach ($dataMahasiswa as $mhs) {
                    if (stripos($mhs, $kata) !== false) {
                        $hasilCari[] = $mhs;
                    }
                }
            } else {
                $hasilCari = $dataMahasiswa;
            }

            if (!empty($hasilCari)) {
                echo "<div class='alert alert-success' style='margin-top: 12px;'>Ditemukan " . count($hasilCari) . " data yang cocok:</div>";
                echo "<ul>";
                foreach ($hasilCari as $item) {
                    echo "<li style='padding: 3px 0;'><strong>" . htmlspecialchars($item, ENT_QUOTES, "UTF-8") . "</strong></li>";
                }
                echo "</ul>";
            } else {
                echo "<div class='alert alert-error' style='margin-top: 12px;'>Tidak ada mahasiswa dengan nama yang mengandung '<em>" . $kataAman . "</em>'.</div>";
            }
            echo "</div>";
        }
        ?>

        <div style="margin-top: 24px; padding: 12px; background: #f8fafc; border-radius: 6px; font-size: 0.88rem; color: #475569;">
            <strong>Daftar Array Tersedia:</strong> <?php echo implode(", ", $dataMahasiswa); ?>
        </div>
    </div>

    <div class="footer">
        &copy; 2026 MARGENT OUWEN SITOMPUL (312510463) - Praktikum Pemrograman Web
    </div>
</div>
</body>
</html>

