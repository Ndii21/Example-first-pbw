<?php
include '../config.php';
$result = mysqli_query($conn, "
    SELECT 
        krs.id, 
        mahasiswa.nama AS nama_mahasiswa, 
        matakuliah.nama AS nama_mk, 
        matakuliah.jumlah_sks
    FROM krs
    JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
    JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk
");


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h2 class="mb-4">📄 Data KRS</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah KRS</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Mata Kuliah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_mahasiswa'] ?></td>
                    <td><?= $row['nama_mk'] ?></td>
                    <td><?= $row['nama_mahasiswa'] ?> Mengambil Mata Kuliah <?= $row['nama_mk'] ?> (<?= $row['jumlah_sks'] ?> SKS)</td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
