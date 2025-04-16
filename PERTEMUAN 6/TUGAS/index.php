<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Rute Penerbangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #0077cc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background-color: #005fa3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Rute Penerbangan</h2>
        <form action="proses.php" method="POST">
            <label>Nama Maskapai:</label>
            <input type="text" name="maskapai" required>

            <label>Bandara Asal:</label>
            <select name="asal" required>
                <?php
                    $bandara_asal = [
                        "Soekarno Hatta" => 65000,
                        "Husein Sastranegara" => 50000,
                        "Abdul Rachman Saleh" => 40000,
                        "Juanda" => 30000
                    ];
                    $asal_keys = array_keys($bandara_asal);
                    sort($asal_keys);
                    foreach ($asal_keys as $asal) {
                        echo "<option value='$asal'>$asal</option>";
                    }
                ?>
            </select>

            <label>Bandara Tujuan:</label>
            <select name="tujuan" required>
                <?php
                    $bandara_tujuan = [
                        "Ngurah Rai" => 85000,
                        "Hasanuddin" => 70000,
                        "Inanwatan" => 90000,
                        "Sultan Iskandar Muda" => 60000
                    ];
                    $tujuan_keys = array_keys($bandara_tujuan);
                    sort($tujuan_keys);
                    foreach ($tujuan_keys as $tujuan) {
                        echo "<option value='$tujuan'>$tujuan</option>";
                    }
                ?>
            </select>

            <label>Harga Tiket:</label>
            <input type="number" name="harga_tiket" required>

            <button type="submit">Proses</button>
        </form>
    </div>
</body>
</html>
