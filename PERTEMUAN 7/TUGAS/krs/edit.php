<?php
include '../config.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM krs WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

// Ambil data mahasiswa dan matakuliah untuk dropdown
$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");
$matkul = mysqli_query($conn, "SELECT * FROM matakuliah");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $npm = $_POST['npm'];
    $kodemk = $_POST['kodemk'];
    
    mysqli_query($conn, "UPDATE krs SET mahasiswa_npm='$npm', matakuliah_kodemk='$kodemk' WHERE id='$id'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <h2 class="mb-4">✏️ Edit KRS</h2>
        <form method="POST" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label class="form-label">Nama Mahasiswa</label>
                <select name="npm" class="form-select" required>
                    <option disabled>-- Pilih Mahasiswa --</option>
                    <?php while ($m = mysqli_fetch_assoc($mahasiswa)): ?>
                        <option value="<?= $m['npm'] ?>" <?= $row['mahasiswa_npm'] == $m['npm'] ? 'selected' : '' ?>>
                            <?= $m['nama'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Mata Kuliah</label>
                <select name="kodemk" class="form-select" required>
                    <option disabled>-- Pilih Mata Kuliah --</option>
                    <?php while ($mk = mysqli_fetch_assoc($matkul)): ?>
                        <option value="<?= $mk['kodemk'] ?>" <?= $row['matakuliah_kodemk'] == $mk['kodemk'] ? 'selected' : '' ?>>
                            <?= $mk['nama'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
