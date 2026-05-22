<?php
date_default_timezone_set('Asia/Makassar');
require_once 'Model.php';

$id_member = '';
$nama_member = '';
$nomor_member = '';
$alamat = '';
$tgl_mendaftar = date('Y-m-d\TH:i');
$tgl_terakhir_bayar = date('Y-m-d');

if (isset($_GET['id_edit'])) {
    $id_member = $_GET['id_edit'];
    $member = getMemberById($id_member);
    if ($member) {
        $nama_member = $member['nama_member'];
        $nomor_member = $member['nomor_member'];
        $alamat = $member['alamat'];
        $tgl_mendaftar = date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar']));
        $tgl_terakhir_bayar = $member['tgl_terakhir_bayar'];
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_member'];
    $nomor = $_POST['nomor_member'];
    $alamat = $_POST['alamat'];
    $tgl_daftar = date('Y-m-d H:i:s', strtotime($_POST['tgl_mendaftar']));
    $tgl_bayar = $_POST['tgl_terakhir_bayar'];

    if (!empty($_POST['id_member'])) {
        updateMember($_POST['id_member'], $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
    } else {
        insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar);
    }
    header("Location: Member.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Member</title>
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
        input[type="text"], input[type="date"], input[type="datetime-local"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: inherit;
        }
        textarea {
            resize: vertical;
            height: 100px;
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
        <h2>Form <?php echo !empty($id_member) ? 'Edit' : 'Tambah'; ?> Member</h2>
        <form action="" method="post">
            <input type="hidden" name="id_member" value="<?php echo htmlspecialchars($id_member); ?>">
            
            <div class="form-group">
                <label>Nama Member</label>
                <input type="text" name="nama_member" value="<?php echo htmlspecialchars($nama_member); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Nomor Member</label>
                <input type="text" name="nomor_member" value="<?php echo htmlspecialchars($nomor_member); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" required><?php echo htmlspecialchars($alamat); ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Tanggal Mendaftar</label>
                <input type="datetime-local" name="tgl_mendaftar" value="<?php echo htmlspecialchars($tgl_mendaftar); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Tanggal Terakhir Bayar</label>
                <input type="date" name="tgl_terakhir_bayar" value="<?php echo htmlspecialchars($tgl_terakhir_bayar); ?>" required>
            </div>
            
            <button type="submit" name="submit" class="btn-submit">Simpan Data</button>
            <a href="Member.php" class="btn-kembali">Kembali ke Data Member</a>
        </form>
    </div>

</body>
</html>