<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 3 - Soal 4</title>
</head>
<body>
    <?php
    $bintang = 0;

    if (isset($_POST['submit']) || isset($_POST['tambah']) || isset($_POST['kurang'])) {
        $bintang = $_POST['jumlah_bintang'];

        if (isset($_POST['tambah'])) {
            $bintang++;
        } elseif (isset($_POST['kurang'])) {
            $bintang--;
        }
    }
    ?>

    <?php if ($bintang == 0): ?>
        <form action="" method="POST">
            <label for="jumlah_bintang">Jumlah bintang </label>
            <input type="number" name="jumlah_bintang" id="jumlah_bintang" required><br>
            <button type="submit" name="submit">Submit</button>
        </form>
    <?php else: ?>
        <p>Jumlah bintang <?= $bintang ?></p>
        <br><br>
        <?php
        $i = 1;
        while ($i <= $bintang) {
            echo "<img src='star-images-9441.png' style='width:50px; height:50px;'>";
            $i++;
        }
        ?>
        <br>
        <form action="" method="POST">
            <input type="hidden" name="jumlah_bintang" value="<?= $bintang ?>">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php endif; ?>

</body>
</html>