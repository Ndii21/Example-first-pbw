<?php
include '../config.php';
$result = mysqli_query($conn, "SELECT * FROM matakuliah");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h2 class="mb-4">📚 Data Mata Kuliah</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Mata Kuliah</a>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Kode MK</th>
                    <th>Nama</th>
                    <th>Jumlah SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['kodemk'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['jumlah_sks'] ?> SKS</td>
                    <td>
                        <a href="edit.php?kodemk=<?= $row['kodemk'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?kodemk=<?= $row['kodemk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
