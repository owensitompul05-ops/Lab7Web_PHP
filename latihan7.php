<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 7 - Pengolahan Data Transaksi | Praktikum 7</title>
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
        <a href="latihan6.php" class="nav-link">Latihan 6</a>
        <a href="latihan7.php" class="nav-link active">Latihan 7</a>
        <a href="mini_project.php" class="nav-link">Mini Project</a>
    </div>

    <div class="card">
        <h2 class="card-title">Latihan 7 — Pengolahan Data Sederhana (Transaksi Kasir)</h2>
        <div class="alert alert-info">
            <strong>Keterangan:</strong> Memvalidasi input nama barang, harga (desimal/angka), dan jumlah (integer positif) dari sisi server secara ketat.
        </div>

        <?php
        function formatRupiah($angka) {
            return "Rp " . number_format($angka, 0, ",", ".");
        }

        $error = null;
        $subtotal = null;
        $barang = "";
        $hargaInput = "";
        $jumlahInput = "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $barang = trim($_POST["barang"] ?? "");
            $hargaInput = trim($_POST["harga"] ?? "");
            $jumlahInput = trim($_POST["jumlah"] ?? "");

            // Validasi server-side ketat sesuai instruksi modul
            if (
                $barang === "" || 
                !is_numeric($hargaInput) || 
                !ctype_digit((string)$jumlahInput) || 
                (float)$hargaInput < 0 || 
                (int)$jumlahInput < 1
            ) {
                $error = "Periksa kembali input: Nama barang wajib diisi, harga harus angka >= 0, dan jumlah harus bilangan bulat >= 1.";
            } else {
                $harga = (float)$hargaInput;
                $jumlah = (int)$jumlahInput;
                $subtotal = $harga * $jumlah;
            }
        }
        ?>

        <?php if ($error !== null): ?>
            <div class="alert alert-error">
                <strong>Validasi Gagal:</strong> <?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8"); ?>
            </div>
        <?php elseif ($subtotal !== null): ?>
            <div class="alert alert-success">
                <h3 style="margin-bottom: 8px;">Ringkasan Transaksi Pembelian:</h3>
                <p><strong>Nama Barang:</strong> <?php echo htmlspecialchars($barang, ENT_QUOTES, "UTF-8"); ?></p>
                <p><strong>Harga Satuan:</strong> <?php echo formatRupiah($harga); ?></p>
                <p><strong>Jumlah Item:</strong> <?php echo $jumlah; ?> pcs</p>
                <hr style="margin: 8px 0; border: 0; border-top: 1px dashed #22c55e;">
                <p style="font-size: 1.15rem;"><strong>Total Subtotal:</strong> <span style="color: #166534; font-weight: 700;"><?php echo formatRupiah($subtotal); ?></span></p>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="barang">Nama Barang:</label>
                <input id="barang" name="barang" type="text" placeholder="Misal: Flashdisk 32GB" value="<?php echo htmlspecialchars($barang, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga Satuan (Rp):</label>
                <input id="harga" name="harga" type="number" min="0" step="any" placeholder="Misal: 75000" value="<?php echo htmlspecialchars($hargaInput, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah Beli (pcs):</label>
                <input id="jumlah" name="jumlah" type="number" min="1" step="1" placeholder="Misal: 3" value="<?php echo htmlspecialchars($jumlahInput, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Hitung Subtotal</button>
                <button type="reset" class="btn btn-secondary">Reset Form</button>
                <a href="latihan7.php" class="btn btn-secondary">Bersihkan Transaksi</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; 2026 MARGENT OUWEN SITOMPUL (312510463) - Praktikum Pemrograman Web
    </div>
</div>
</body>
</html>

