<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 204</title>
</head>
<body>

    <form method="post">
        Nilai: <input type="number" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"><br>
        <button type="submit" name="konversi">Konversi</button>
    </form>

    <?php
    if (isset($_POST['konversi'])) {
        $nilai = $_POST['nilai'];
        $hasil = "";

        if ($nilai == 0) {
            $hasil = "Nol";
        } elseif ($nilai >= 1 && $nilai <= 9) {
            $hasil = "Satuan";
        } elseif ($nilai >= 11 && $nilai <= 19) {
            $hasil = "Belasan";
        } elseif ($nilai == 10 || ($nilai >= 20 && $nilai <= 99)) {
            $hasil = "Puluhan";
        } elseif ($nilai >= 100 && $nilai <= 999) {
            $hasil = "Ratusan";
        } elseif ($nilai >= 1000) {
            $hasil = "Anda Menginput Melebihi Limit Bilangan";
        } else {
            $hasil = "Input tidak valid (Bilangan Cacah harus >= 0)";
        }

        echo "<h1>Hasil: $hasil</h1>";
    }
    ?>
</body>
</html>