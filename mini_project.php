<?php
// ==========================================================================
// Praktikum 7: Pemrograman Server-Side dengan PHP
// Mini Project — Aplikasi Formulir Data Mahasiswa
// Nama : MARGENT OUWEN SITOMPUL
// NIM  : 312510463
// ==========================================================================

// Bagian 1: Pemrosesan Data & Validasi Server-Side
$data = null;
$error = [];

$nama = "";
$nim = "";
$prodi = "";
$semesterInput = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = trim($_POST["semester"] ?? "");
    $email = trim($_POST["email"] ?? "");

    // 1. Validasi Kolom Wajib Diisi
    if ($nama === "") {
        $error[] = "Nama lengkap wajib diisi.";
    }

    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } else {
        // Eksperimen Mandiri 4: Validasi NIM hanya berisi angka dan panjangnya 9 digit
        if (!preg_match('/^[0-9]{9}$/', $nim)) {
            $error[] = "NIM harus berupa 9 digit angka (contoh: 312510463).";
        }
    }

    if ($prodi === "") {
        $error[] = "Program studi wajib dipilih / diisi.";
    }

    // 2. Validasi Format Email
    if ($email === "") {
        $error[] = "Alamat email wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid (contoh yang benar: nama@domain.com).";
    }

    // 3. Validasi Semester (Angka bulat 1–14)
    if ($semesterInput === "") {
        $error[] = "Semester wajib diisi.";
    } elseif (!ctype_digit((string)$semesterInput) || (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa bilangan bulat antara rentang 1 sampai 14.";
    }

    // Jika tidak ada error, kemas data
    if (empty($error)) {
        $data = [
            "nama" => $nama,
            "nim" => $nim,
            "prodi" => $prodi,
            "semester" => (int)$semesterInput,
            "email" => $email,
            "waktu_submit" => date("d-m-Y H:i:s")
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project - Formulir Data Mahasiswa | Praktikum 7</title>
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
        <a href="latihan7.php" class="nav-link">Latihan 7</a>
        <a href="mini_project.php" class="nav-link active">Mini Project</a>
    </div>

    <div class="card">
        <h2 class="card-title">Mini Project — Formulir Biodata Mahasiswa</h2>
        <div class="alert alert-info">
            <strong>Fitur Validasi & Eksperimen Mandiri:</strong>
            <ul style="margin-left: 20px; margin-top: 6px;">
                <li>Pengiriman formulir menggunakan metode <code>POST</code>.</li>
                <li>Validasi server-side lengkap untuk kolom wajib, format email, dan rentang semester (1-14).</li>
                <li><strong>Eksperimen Mandiri 4:</strong> Validasi format NIM spesifik 9 digit angka (contoh: NIM <code>312510463</code>).</li>
                <li><strong>Eksperimen Mandiri 5:</strong> Tombol reset formulir (Client-side vs Server-side).</li>
                <li>Sanitasi seluruh luaran menggunakan <code>htmlspecialchars()</code> untuk perlindungan keamanan.</li>
            </ul>
        </div>

        <!-- Tampilan Pesan Error Jika Validasi Gagal -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-error">
                <strong>Terjadi kesalahan validasi data (<?php echo count($error); ?> kesalahan):</strong>
                <ul>
                    <?php foreach ($error as $errMsg): ?>
                        <li><?php echo htmlspecialchars($errMsg, ENT_QUOTES, "UTF-8"); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Tampilan Ringkasan Jika Data Valid -->
        <?php if ($data !== null): ?>
            <div class="alert alert-success" style="margin-bottom: 24px;">
                <h3 style="margin-bottom: 12px; color: #166534;">Data Mahasiswa Berhasil Disimpan & Divalidasi!</h3>
                <table>
                    <tbody>
                        <tr>
                            <td style="width: 200px;"><strong>Nama Lengkap</strong></td>
                            <td><?php echo htmlspecialchars($data["nama"], ENT_QUOTES, "UTF-8"); ?></td>
                        </tr>
                        <tr>
                            <td><strong>NIM</strong></td>
                            <td><code><?php echo htmlspecialchars($data["nim"], ENT_QUOTES, "UTF-8"); ?></code> <span class="badge badge-a">Valid 9 Digit</span></td>
                        </tr>
                        <tr>
                            <td><strong>Program Studi</strong></td>
                            <td><?php echo htmlspecialchars($data["prodi"], ENT_QUOTES, "UTF-8"); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Semester</strong></td>
                            <td>Semester <?php echo htmlspecialchars((string)$data["semester"], ENT_QUOTES, "UTF-8"); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td><?php echo htmlspecialchars($data["email"], ENT_QUOTES, "UTF-8"); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Waktu Pengiriman</strong></td>
                            <td><?php echo htmlspecialchars($data["waktu_submit"], ENT_QUOTES, "UTF-8"); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <!-- Formulir Input Mahasiswa -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama Lengkap: <span style="color: red;">*</span></label>
                <input type="text" id="nama" name="nama" placeholder="Misal: MARGENT OUWEN SITOMPUL" value="<?php echo htmlspecialchars($nama, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="form-group">
                <label for="nim">Nomor Induk Mahasiswa (NIM): <span style="color: red;">* (9 Digit Angka)</span></label>
                <input type="text" id="nim" name="nim" placeholder="Misal: 312510463" pattern="[0-9]{9}" title="NIM harus terdiri dari 9 digit angka" value="<?php echo htmlspecialchars($nim, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="form-group">
                <label for="prodi">Program Studi: <span style="color: red;">*</span></label>
                <select id="prodi" name="prodi" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <option value="Teknik Informatika" <?php echo ($prodi === "Teknik Informatika" || empty($prodi)) ? "selected" : ""; ?>>Teknik Informatika</option>
                    <option value="Sistem Informasi" <?php echo ($prodi === "Sistem Informasi") ? "selected" : ""; ?>>Sistem Informasi</option>
                    <option value="Teknologi Informasi" <?php echo ($prodi === "Teknologi Informasi") ? "selected" : ""; ?>>Teknologi Informasi</option>
                    <option value="Teknik Komputer" <?php echo ($prodi === "Teknik Komputer") ? "selected" : ""; ?>>Teknik Komputer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="semester">Semester (1 - 14): <span style="color: red;">*</span></label>
                <input type="number" id="semester" name="semester" min="1" max="14" placeholder="Misal: 4" value="<?php echo htmlspecialchars((string)$semesterInput, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Alamat Email Mahasiswa: <span style="color: red;">*</span></label>
                <input type="email" id="email" name="email" placeholder="Misal: margent.sitompul@mhs.pelitabangsa.ac.id" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Simpan Data Mahasiswa</button>
                <!-- Eksperimen Mandiri 5: Reset pada form -->
                <button type="reset" class="btn btn-secondary">Reset Input (Client)</button>
                <a href="mini_project.php" class="btn btn-secondary">Clear / Muat Ulang Halaman</a>
            </div>
        </form>

        <div style="margin-top: 24px; font-size: 0.88rem; color: #475569; background: #f8fafc; padding: 14px; border-radius: 6px;">
            <strong>Catatan Eksperimen Mandiri 5 (Reset Form vs Pemrosesan Ulang di Server):</strong>
            <p style="margin-top: 4px;">
                Tombol <em>Reset Input (Client)</em> bertipe <code>type="reset"</code> bekerja secara instan di browser tanpa mengirimkan request HTTP ke server. Tombol ini hanya mengembalikan nilai elemen input form ke nilai awal saat formulir pertama kali dimuat. Sebaliknya, tombol <em>Clear / Muat Ulang</em> mengirimkan request GET baru ke server sehingga seluruh variabel penampung data (state) di memori PHP dibersihkan dari awal.
            </p>
        </div>
    </div>

    <div class="footer">
        &copy; 2026 MARGENT OUWEN SITOMPUL (312510463) - Praktikum Pemrograman Web
    </div>
</div>
</body>
</html>

