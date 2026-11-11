<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3 - Perulangan dan Array | Praktikum 7</title>
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
        <a href="latihan3.php" class="nav-link active">Latihan 3</a>
        <a href="latihan4.php" class="nav-link">Latihan 4</a>
        <a href="latihan5.php" class="nav-link">Latihan 5</a>
        <a href="latihan6.php" class="nav-link">Latihan 6</a>
        <a href="latihan7.php" class="nav-link">Latihan 7</a>
        <a href="mini_project.php" class="nav-link">Mini Project</a>
    </div>

    <div class="card">
        <h2 class="card-title">Latihan 3 — Perulangan dan Array</h2>
        <div class="alert alert-info">
            <strong>Instruksi Modul:</strong> Menambahkan minimal tiga nama mahasiswa pada array awal (Alya, Bima, Citra, Doni) dan menampilkan seluruhnya menggunakan perulangan <code>foreach</code>.
        </div>

        <?php
        // Array awal ditambah minimal 3 mahasiswa baru: Margent Ouwen Sitompul, Eka Ramadhan, Fiona Lestari
        $mahasiswa = [
            "Alya",
            "Bima",
            "Citra",
            "Doni",
            "MARGENT OUWEN SITOMPUL",
            "Eka Ramadhan",
            "Fiona Lestari"
        ];
        ?>

        <h3>Daftar Mahasiswa (Menggunakan Tag &lt;ol&gt;)</h3>
        <ol style="margin-left: 24px; margin-top: 10px; margin-bottom: 20px;">
        <?php
        foreach ($mahasiswa as $nama) {
            echo "<li style='padding: 4px 0;'>" . htmlspecialchars($nama) . "</li>";
        }
        ?>
        </ol>

        <h3 style="margin-top: 20px;">Tabel Daftar Mahasiswa</h3>
        <table>
            <thead>
                <tr>
                    <th style="width: 80px;">No</th>
                    <th>Nama Mahasiswa</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($mahasiswa as $nama) {
                    $isUser = ($nama === "MARGENT OUWEN SITOMPUL");
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td><strong>" . htmlspecialchars($nama) . "</strong></td>";
                    echo "<td>" . ($isUser ? "<span class='badge badge-a'>Mahasiswa (Praktikan)</span>" : "<span class='badge badge-b'>Mahasiswa</span>") . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <p style="margin-top: 12px; font-size: 0.9rem; color: var(--text-muted);">
            Total mahasiswa terdaftar dalam array: <strong><?php echo count($mahasiswa); ?> orang</strong> (ditambahkan 3 nama baru dari daftar awal).
        </p>
    </div>

    <div class="footer">
        &copy; 2026 MARGENT OUWEN SITOMPUL (312510463) - Praktikum Pemrograman Web
    </div>
</div>
</body>
</html>

