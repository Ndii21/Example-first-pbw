<?php
include 'db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");

//mengarahkan ke file yg dituju, kalau ini ke index,php
header("location: index.php");
?>