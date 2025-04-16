<?php
$maskapai = $_POST['maskapai'];
$asal = $_POST['asal'];
$tujuan = $_POST['tujuan'];
$harga_tiket = (int) $_POST['harga_tiket'];

$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

$pajak_asal = isset($bandara_asal[$asal]) ? $bandara_asal[$asal] : 0;
$pajak_tujuan = isset($bandara_tujuan[$tujuan]) ? $bandara_tujuan[$tujuan] : 0;

$total_pajak = $pajak_asal + $pajak_tujuan;
$total_harga = $harga_tiket + $total_pajak;

$nomor = strtoupper(uniqid("RT-"));
$tanggal = date("d-m-Y");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            width: 600px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f7f7f7;
            width: 40%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Rute Penerbangan</h2>
        <table>
            <tr>
                <th>Nomor</th>
                <td><?= $nomor ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?= $tanggal ?></td>
            </tr>
            <tr>
                <th>Maskapai</th>
                <td><?= htmlspecialchars($maskapai) ?></td>
            </tr>
            <tr>
                <th>Asal Penerbangan</th>
                <td><?= $asal ?> (Rp<?= number_format($pajak_asal) ?>)</td>
            </tr>
            <tr>
                <th>Tujuan Penerbangan</th>
                <td><?= $tujuan ?> (Rp<?= number_format($pajak_tujuan) ?>)</td>
            </tr>
            <tr>
                <th>Harga Tiket</th>
                <td>Rp<?= number_format($harga_tiket) ?></td>
            </tr>
            <tr>
                <th>Total Pajak</th>
                <td>Rp<?= number_format($total_pajak) ?></td>
            </tr>
            <tr>
                <th>Total Harga Tiket</th>
                <td><strong>Rp<?= number_format($total_harga) ?></strong></td>
            </tr>
        </table>

        <div style="text-align: center; margin-top: 20px;">
    <a href="index.php" style="
        display: inline-block;
        padding: 10px 20px;
        background-color: #0077cc;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: bold;
    ">← Kembali ke Form</a>
</div>

    </div>
</body>
</html>
