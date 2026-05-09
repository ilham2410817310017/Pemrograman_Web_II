<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 3 - Soal 2</title>
</head>
<body>
    <form action="" method="POST">
        <label for="tinggi">Tinggi :</label>
        <input type="number" name="tinggi" id="tinggi" value="<?= isset($_POST['tinggi']) ? $_POST['tinggi'] : '' ?>" required><br>
        
        <label for="alamat_gambar">Alamat Gambar :</label>
        <input type="text" name="alamat_gambar" id="alamat_gambar" value="<?= isset($_POST['alamat_gambar']) ? $_POST['alamat_gambar'] : 'https://cdn0.iconfinder.com/data/icons/web-and-mobile-icons-volume-2/128/52-512.png' ?>" required><br>
        
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $tinggi = $_POST['tinggi'];
        $gambar = $_POST['alamat_gambar'];

        $i = 1;
        while ($i <= $tinggi) {
            $j = 1;
            while ($j < $i) {
                echo "<img src='$gambar' style='width:25px; height:25px; opacity:0;'>";
                $j++;
            }

            $k = $tinggi;
            while ($k >= $i) {
                echo "<img src='$gambar' style='width:25px; height:25px;'>";
                $k--;
            }
            
            echo "<br>";
            $i++;
        }
    }
    ?>
</body>
</html>