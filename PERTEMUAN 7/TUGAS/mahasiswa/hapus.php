<?php
include '../config.php';

$npm = $_GET['npm'];
mysqli_query($conn, "DELETE FROM mahasiswa WHERE npm='$npm'");

header("Location: index.php");
?>
