<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];
    mysqli_query($conn, "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES ('$npm', '$kodemk')");
    header("Location: index.php");
}


$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");
$matkul = mysqli_query($conn, "SELECT * FROM matakuliah");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h2 class="mb-4">➕ Tambah KRS</h2>
        <form method="POST" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <select name="npm" class="form-select" required>
                    <option disabled selected>-- Pilih Mahasiswa --</option>
                    <?php while ($m = mysqli_fetch_assoc($mahasiswa)): ?>
                        <option value="<?= $m['npm'] ?>"><?= $m['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                <select name="kodemk" class="form-select" required>
                    <option disabled selected>-- Pilih Mata Kuliah --</option>
                    <?php while ($mk = mysqli_fetch_assoc($matkul)): ?>
                        <option value="<?= $mk['kodemk'] ?>"><?= $mk['nama'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
