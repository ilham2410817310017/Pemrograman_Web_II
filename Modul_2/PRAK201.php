<?php
$n1 = $n2 = $n3 = "";

if (isset($_POST['urutkan'])) {
    $n1 = $_POST['nama1'];
    $n2 = $_POST['nama2'];
    $n3 = $_POST['nama3'];

    if ($n1 > $n2) { $tmp = $n1; $n1 = $n2; $n2 = $tmp; }
    if ($n1 > $n3) { $tmp = $n1; $n1 = $n3; $n3 = $tmp; }
    if ($n2 > $n3) { $tmp = $n2; $n2 = $n3; $n3 = $tmp; }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 201</title>
</head>
<body>
    <form method="POST">
        Nama: 1 <input type="text" name="nama1" value="<?php echo $n1; ?>"><br>
        Nama: 2 <input type="text" name="nama2" value="<?php echo $n2; ?>"><br>
        Nama: 3 <input type="text" name="nama3" value="<?php echo $n3; ?>"><br>
        <button type="submit" name="urutkan">Urutkan</button>
    </form>
</body>
</html>