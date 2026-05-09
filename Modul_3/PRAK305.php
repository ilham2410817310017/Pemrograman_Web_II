<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 3 - Soal 5</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="kata" value="<?= isset($_POST['kata']) ? $_POST['kata'] : '' ?>" required>
        <button type="submit" name="submit">submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $kata = $_POST['kata'];
        $panjang = strlen($kata);

        echo "<h2>Input:</h2>";
        echo "<p>$kata</p>";
        
        echo "<h2>Output:</h2>";
        echo "<p>";
        
        for ($i = 0; $i < $panjang; $i++) {
            $huruf = $kata[$i];
            
            for ($j = 0; $j < $panjang; $j++) {
                if ($j == 0) {
                    echo strtoupper($huruf);
                } else {
                    echo strtolower($huruf);
                }
            }
        }
        
        echo "</p>";
    }
    ?>
</body>
</html>