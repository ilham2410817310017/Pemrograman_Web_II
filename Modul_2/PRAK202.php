<?php
$namaErr = $nimErr = $jkErr = "";
$nama = $nim = $jk = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    if (empty($_POST["nama"])) {
        $namaErr = "nama tidak boleh kosong";
    } else {
        $nama = $_POST["nama"];
    }

    if (empty($_POST["nim"])) {
        $nimErr = "nim tidak boleh kosong";
    } else {
        $nim = $_POST["nim"];
    }

    // Validasi Jenis Kelamin
    if (empty($_POST["jenis_kelamin"])) {
        $jkErr = "jenis kelamin tidak boleh kosong";
    } else {
        $jk = $_POST["jenis_kelamin"];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 202</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nama: <input type="text" name="nama" value="<?php echo $nama;?>">
        <span class="error">* <?php echo $namaErr;?></span><br>
        
        Nim: <input type="text" name="nim" value="<?php echo $nim;?>">
        <span class="error">* <?php echo $nimErr;?></span><br>
        
        Jenis Kelamin : <span class="error">* <?php echo $jkErr;?></span><br>
        <input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php if (isset($jk) && $jk=="Laki-Laki") echo "checked";?>> Laki-Laki <br>
        <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if (isset($jk) && $jk=="Perempuan") echo "checked";?>> Perempuan <br>
        
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $namaErr == "" && $nimErr == "" && $jkErr == "") {
        echo "<h2>Output:</h2>";
        echo "$nama <br>";
        echo "$nim <br>";
        echo "$jk <br>";
    }
    ?>
</body>
</html>