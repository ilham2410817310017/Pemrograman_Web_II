<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 3 - Soal 1</title>
</head>
<body>
    <form action="" method="POST">
        <label for="jumlah">Jumlah Peserta :</label>
        <input type="number" name="jumlah_peserta" id="jumlah" 
               value="<?= isset($_POST['jumlah_peserta']) ? $_POST['jumlah_peserta'] : '' ?>" required>
        <br>
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $jumlah = $_POST['jumlah_peserta'];
        $i = 1;

        while ($i <= $jumlah) {
            if ($i % 2 == 1) {
                echo "<h2 style='color: red; margin: 10px 0;'>Peserta ke-$i</h2>";
            } else {
                echo "<h2 style='color: green; margin: 10px 0;'>Peserta ke-$i</h2>";
            }
            $i++; 
        }
    }
    ?>
</body>
</html>