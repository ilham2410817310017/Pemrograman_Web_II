<?php
date_default_timezone_set('Asia/Makassar');
require_once 'Model.php';

$id_peminjaman = '';
$id_member_terpilih = '';
$id_buku_terpilih = '';
$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+7 days'));

$daftar_member = getMember();
$daftar_buku = getBuku();

if (isset($_GET['id_edit'])) {
    $id_peminjaman = $_GET['id_edit'];
    $peminjaman = getPeminjamanById($id_peminjaman);
    if ($peminjaman) {
        $id_member_terpilih = $peminjaman['id_member'];
        $id_buku_terpilih = $peminjaman['id_buku'];
        $tgl_pinjam = $peminjaman['tgl_pinjam'];
        $tgl_kembali = $peminjaman['tgl_kembali'];
    }
}

if (isset($_POST['submit'])) {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $pinjam = $_POST['tgl_pinjam'];
    $kembali = $_POST['tgl_kembali'];

    if (!empty($_POST['id_peminjaman'])) {
        updatePeminjaman($_POST['id_peminjaman'], $id_member, $id_buku, $pinjam, $kembali);
    } else {
        insertPeminjaman($id_member, $id_buku, $pinjam, $kembali);
    }
    header("Location: Peminjaman.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>
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
        input[type="date"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: inherit;
            background-color: white;
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
        <h2>Form <?php echo !empty($id_peminjaman) ? 'Edit' : 'Tambah'; ?> Peminjaman</h2>
        <form action="" method="post">
            <input type="hidden" name="id_peminjaman" value="<?php echo htmlspecialchars($id_peminjaman); ?>">
            
            <div class="form-group">
                <label>Pilih Member</label>
                <select name="id_member" required>
                    <option value="" disabled <?php echo empty($id_member_terpilih) ? 'selected' : ''; ?>>-- Pilih Nama Member --</option>
                    <?php foreach ($daftar_member as $m): ?>
                        <option value="<?php echo $m['id_member']; ?>" <?php echo ($m['id_member'] == $id_member_terpilih) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($m['nama_member']) . " (ID: " . $m['id_member'] . ")"; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Pilih Buku</label>
                <select name="id_buku" required>
                    <option value="" disabled <?php echo empty($id_buku_terpilih) ? 'selected' : ''; ?>>-- Pilih Judul Buku --</option>
                    <?php foreach ($daftar_buku as $b): ?>
                        <option value="<?php echo $b['id_buku']; ?>" <?php echo ($b['id_buku'] == $id_buku_terpilih) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($b['judul_buku']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label>Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" value="<?php echo htmlspecialchars($tgl_pinjam); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" value="<?php echo htmlspecialchars($tgl_kembali); ?>" required>
            </div>
            
            <button type="submit" name="submit" class="btn-submit">Simpan Data</button>
            <a href="Peminjaman.php" class="btn-kembali">Kembali ke Data Peminjaman</a>
        </form>
    </div>

</body>
</html>