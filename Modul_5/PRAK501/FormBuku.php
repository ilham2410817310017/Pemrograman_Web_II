<?php
require_once 'Model.php';

$id_buku = '';
$judul_buku = '';
$penulis = '';
$penerbit = '';
$tahun_terbit = '';

if (isset($_GET['id_edit'])) {
    $id_buku = $_GET['id_edit'];
    $buku = getBukuById($id_buku);
    if ($buku) {
        $judul_buku = $buku['judul_buku'];
        $penulis = $buku['penulis'];
        $penerbit = $buku['penerbit'];
        $tahun_terbit = $buku['tahun_terbit'];
    }
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul_buku'];
    $pen_ulis = $_POST['penulis'];
    $pener_bit = $_POST['penerbit'];
    $tahun = $_POST['tahun_terbit'];

    if (!empty($_POST['id_buku'])) {
        updateBuku($_POST['id_buku'], $judul, $pen_ulis, $pener_bit, $tahun);
    } else {
        insertBuku($judul, $pen_ulis, $pener_bit, $tahun);
    }
    header("Location: Buku.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f7f6;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: inherit;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
        .btn-kembali {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-kembali:hover {
            text-decoration: underline;
            color: #343a40;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Form <?php echo !empty($id_buku) ? 'Edit' : 'Tambah'; ?> Buku</h2>
        <form action="" method="post">
            <input type="hidden" name="id_buku" value="<?php echo htmlspecialchars($id_buku); ?>">
            
            <div class="form-group">
                <label>Judul Buku</label>
                <input type="text" name="judul_buku" value="<?php echo htmlspecialchars($judul_buku); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Penulis</label>
                <input type="text" name="penulis" value="<?php echo htmlspecialchars($penulis); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Penerbit</label>
                <input type="text" name="penerbit" value="<?php echo htmlspecialchars($penerbit); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Tahun Terbit</label>
                <input type="number" name="tahun_terbit" value="<?php echo htmlspecialchars($tahun_terbit); ?>" required>
            </div>
            
            <button type="submit" name="submit" class="btn-submit">Simpan Data</button>
            <a href="Buku.php" class="btn-kembali">Kembali ke Data Buku</a>
        </form>
    </div>

</body>
</html>