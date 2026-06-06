<?php
$panjang = "";
$lebar = "";
$nilai = "";
$error = "";
$matriks = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panjang = isset($_POST['panjang']) ? intval($_POST['panjang']) : 0;
    $lebar = isset($_POST['lebar']) ? intval($_POST['lebar']) : 0;
    $nilai = isset($_POST['nilai']) ? trim($_POST['nilai']) : "";

    if (!empty($nilai)) {
        $arr_nilai = explode(" ", $nilai);
        $total_elemen = count($arr_nilai);

        if ($total_elemen == ($panjang * $lebar)) {
            $index = 0;
            for ($i = 0; $i < $panjang; $i++) {
                for ($j = 0; $j < $lebar; $j++) {
                    $matriks[$i][$j] = $arr_nilai[$index];
                    $index++;
                }
            }
        } else {
            $error = "Panjang nilai tidak sesuai dengan ukuran matriks";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK401</title>
    <style>
        .matriks-table, .matriks-table tr, .matriks-table td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
        .matriks-table {
            margin-top: 20px;
        }
        form table {
            border-collapse: collapse;
        }
        form td {
            padding: 2px 0;
        }
        .form-error {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <form method="post" action="">
        <table>
            <tr>
                <td>Panjang</td>
                <td>:</td>
                <td><input type="text" name="panjang" value="<?php echo htmlspecialchars($panjang); ?>"></td>
            </tr>
            <tr>
                <td>Lebar</td>
                <td>:</td>
                <td><input type="text" name="lebar" value="<?php echo htmlspecialchars($lebar); ?>"></td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td>:</td>
                <td><input type="text" name="nilai" value="<?php echo htmlspecialchars($nilai); ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="cetak" value="Cetak"></td>
            </tr>
        </table>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($error)) {
            echo "<div class='form-error'>" . htmlspecialchars($error) . "</div>";
        } elseif (!empty($matriks)) {
            echo "<table class='matriks-table'>";
            for ($i = 0; $i < $panjang; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $lebar; $j++) {
                    echo "<td>" . htmlspecialchars($matriks[$i][$j]) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    ?>

</body>
</html>