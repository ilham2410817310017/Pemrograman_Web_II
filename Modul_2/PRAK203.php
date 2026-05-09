<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 203</title>
</head>
<body>

    <form method="post">
        Nilai : <input type="number" name="nilai" step="any" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"><br>
        
        Dari : <br>
        <input type="radio" name="dari" value="Celcius" <?php if (isset($_POST['dari']) && $_POST['dari'] == "Celcius") echo "checked"; ?>> Celcius <br>
        <input type="radio" name="dari" value="Fahrenheit" <?php if (isset($_POST['dari']) && $_POST['dari'] == "Fahrenheit") echo "checked"; ?>> Fahrenheit <br>
        <input type="radio" name="dari" value="Rheamur" <?php if (isset($_POST['dari']) && $_POST['dari'] == "Rheamur") echo "checked"; ?>> Rheamur <br>
        <input type="radio" name="dari" value="Kelvin" <?php if (isset($_POST['dari']) && $_POST['dari'] == "Kelvin") echo "checked"; ?>> Kelvin <br>

        Ke : <br>
        <input type="radio" name="ke" value="Celcius" <?php if (isset($_POST['ke']) && $_POST['ke'] == "Celcius") echo "checked"; ?>> Celcius <br>
        <input type="radio" name="ke" value="Fahrenheit" <?php if (isset($_POST['ke']) && $_POST['ke'] == "Fahrenheit") echo "checked"; ?>> Fahrenheit <br>
        <input type="radio" name="ke" value="Rheamur" <?php if (isset($_POST['ke']) && $_POST['ke'] == "Rheamur") echo "checked"; ?>> Rheamur <br>
        <input type="radio" name="ke" value="Kelvin" <?php if (isset($_POST['ke']) && $_POST['ke'] == "Kelvin") echo "checked"; ?>> Kelvin <br>
        
        <button type="submit" name="konversi">Konversi</button>
    </form>

    <?php
    if (isset($_POST['konversi'])) {
        $nilai = $_POST['nilai'];
        $dari = $_POST['dari'];
        $ke = $_POST['ke'];
        $temp = 0; 
        $hasil = 0;
        $satuan = "";

        if ($dari == "Celcius") {
            $temp = $nilai;
        } elseif ($dari == "Fahrenheit") {
            $temp = ($nilai - 32) * 5/9;
        } elseif ($dari == "Rheamur") {
            $temp = $nilai * 5/4;
        } elseif ($dari == "Kelvin") {
            $temp = $nilai - 273.15;
        }

        if ($ke == "Celcius") {
            $hasil = $temp;
            $satuan = "°C";
        } elseif ($ke == "Fahrenheit") {
            $hasil = ($temp * 9/5) + 32;
            $satuan = "°F";
        } elseif ($ke == "Rheamur") {
            $hasil = $temp * 4/5;
            $satuan = "°R";
        } elseif ($ke == "Kelvin") {
            $hasil = $temp + 273.15;
            $satuan = "°K";
        }
        echo "<h2>Hasil Konversi: " . number_format($hasil, 1) . " $satuan</h2>";
    }
    ?>

</body>
</html>