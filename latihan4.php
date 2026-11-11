<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 4 - Membuat Function | Praktikum 7</title>
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
        <a href="latihan4.php" class="nav-link active">Latihan 4</a>
        <a href="latihan5.php" class="nav-link">Latihan 5</a>
        <a href="latihan6.php" class="nav-link">Latihan 6</a>
        <a href="latihan7.php" class="nav-link">Latihan 7</a>
        <a href="mini_project.php" class="nav-link">Mini Project</a>
    </div>

    <div class="card">
        <h2 class="card-title">Latihan 4 — Membuat Function</h2>
        <div class="alert alert-info">
            <strong>Instruksi Modul & Eksperimen:</strong>
            <ul style="margin-left: 20px; margin-top: 6px;">
                <li>Function dasar <code>hitungDiskon($harga, $persen)</code></li>
                <li>Eksperimen Mandiri 3: Function <code>formatRupiah($angka)</code></li>
                <li>Function tambahan: <code>hitungLuasPersegiPanjang($panjang, $lebar)</code></li>
                <li>Function tambahan: <code>tentukanKelulusan($nilai)</code></li>
            </ul>
        </div>

        <?php
        // Eksperimen Mandiri 3: Function format Rupiah
        function formatRupiah($angka) {
            return "Rp " . number_format($angka, 0, ",", ".");
        }

        // 1. Function hitungDiskon dari modul
        function hitungDiskon($harga, $persen) {
            $potongan = $harga * ($persen / 100);
            return $harga - $potongan;
        }

        // 2. Function tambahan 1: Luas Persegi Panjang
        function hitungLuasPersegiPanjang($panjang, $lebar) {
            return $panjang * $lebar;
        }

        // 3. Function tambahan 2: Menentukan Kelulusan
        function tentukanKelulusan($nilai, $kkm = 65) {
            if ($nilai >= $kkm) {
                return ["status" => "LULUS", "keterangan" => "Selamat, Anda dinyatakan lulus!"];
            } else {
                return ["status" => "TIDAK LULUS", "keterangan" => "Maaf, Anda belum mencapai batas KKM ($kkm)."];
            }
        }

        // Contoh uji coba
        $hargaAwal = 150000;
        $persenDiskon = 10;
        $hargaAkhir = hitungDiskon($hargaAwal, $persenDiskon);

        $p = 12;
        $l = 6;
        $luas = hitungLuasPersegiPanjang($p, $l);

        $sampleNilai1 = 82;
        $sampleNilai2 = 55;
        $status1 = tentukanKelulusan($sampleNilai1);
        $status2 = tentukanKelulusan($sampleNilai2);
        ?>

        <h3 style="margin-top: 16px;">1. Perhitungan Diskon & Format Rupiah</h3>
        <table>
            <tr>
                <td style="width: 260px;"><strong>Harga Awal</strong></td>
                <td><?php echo formatRupiah($hargaAwal); ?></td>
            </tr>
            <tr>
                <td><strong>Diskon</strong></td>
                <td><?php echo $persenDiskon; ?>%</td>
            </tr>
            <tr>
                <td><strong>Harga Setelah Diskon</strong></td>
                <td><strong style="color: #16a34a;"><?php echo formatRupiah($hargaAkhir); ?></strong></td>
            </tr>
        </table>

        <h3 style="margin-top: 24px;">2. Perhitungan Luas Persegi Panjang</h3>
        <table>
            <tr>
                <td style="width: 260px;"><strong>Panjang</strong></td>
                <td><?php echo $p; ?> cm</td>
            </tr>
            <tr>
                <td><strong>Lebar</strong></td>
                <td><?php echo $l; ?> cm</td>
            </tr>
            <tr>
                <td><strong>Luas ($panjang &times; $lebar)</strong></td>
                <td><strong><?php echo $luas; ?> cm&sup2;</strong></td>
            </tr>
        </table>

        <h3 style="margin-top: 24px;">3. Penentuan Kelulusan Siswa</h3>
        <table>
            <thead>
                <tr>
                    <th>Nilai</th>
                    <th>KKM</th>
                    <th>Hasil Kelulusan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong><?php echo $sampleNilai1; ?></strong></td>
                    <td>65</td>
                    <td><span class="badge badge-a"><?php echo $status1['status']; ?></span></td>
                    <td><?php echo $status1['keterangan']; ?></td>
                </tr>
                <tr>
                    <td><strong><?php echo $sampleNilai2; ?></strong></td>
                    <td>65</td>
                    <td><span class="badge badge-d"><?php echo $status2['status']; ?></span></td>
                    <td><?php echo $status2['keterangan']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; 2026 MARGENT OUWEN SITOMPUL (312510463) - Praktikum Pemrograman Web
    </div>
</div>
</body>
</html>

