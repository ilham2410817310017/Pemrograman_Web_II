<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 3 - Soal 3</title>
</head>
<body>
    <form action="" method="POST">
        <label for="batas_bawah">Batas Bawah :</label>
        <input type="number" name="batas_bawah" id="batas_bawah" value="<?= isset($_POST['batas_bawah']) ? $_POST['batas_bawah'] : '' ?>" required><br>
        
        <label for="batas_atas">Batas Atas :</label>
        <input type="number" name="batas_atas" id="batas_atas" value="<?= isset($_POST['batas_atas']) ? $_POST['batas_atas'] : '' ?>" required><br>
        
        <button type="submit" name="cetak">Cetak</button>
    </form>
    <br>

    <?php
    if (isset($_POST['cetak'])) {
        $batas_bawah = $_POST['batas_bawah'];
        $batas_atas = $_POST['batas_atas'];

        $i = $batas_bawah;

        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src='star-images-9441.png' style='width:20px; height:20px; vertical-align:text-bottom;'>&nbsp;";
            } else {
                echo "$i&nbsp;";
            }
            $i++;
        } while ($i <= $batas_atas);
    }
    ?>
</body>
</html>