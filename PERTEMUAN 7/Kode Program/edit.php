<?php include "db.php" ; ?>

<?php 
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");

    $row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html>

<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h2 class="mb-4">Edit Data Mahasiswa</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIM</label>
            <input type="text" name="nim" value="<?= $row['nim'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="<?= $row['jurusan'] ?>" class="form-control" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>

    <?php
        if(isset($_POST['update'])) {
            $name = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];

            mysqli_query($conn, "UPDATE mahasiswa SET nama='$name', nim='$nim', jurusan='$jurusan' WHERE id='$id' ");

            echo "Data berhasil diubah";
        }
    ?>

  

</body>

</html>