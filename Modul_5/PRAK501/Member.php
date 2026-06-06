<?php
require_once 'Model.php';

if (isset($_GET['id_hapus'])) {
    deleteMember($_GET['id_hapus']);
    header("Location: Member.php");
    exit;
}

$members = getMember();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Member</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f7f6;
        }
        .container {
            max-width: 1000px;
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
        .nav {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }
        .nav a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #e9ecef;
            color: #333;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
        }
        .nav a.active, .nav a:hover {
            background-color: #007bff;
            color: white;
        }
        .btn-tambah {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-tambah:hover {
            background-color: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-hapus {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
        }
        .btn-hapus:hover {
            background-color: #c82333;
        }
        .empty-data {
            text-align: center;
            font-style: italic;
            color: #777;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="nav">
            <a href="Member.php" class="active">Member</a>
            <a href="Buku.php">Buku</a>
            <a href="Peminjaman.php">Peminjaman</a>
        </div>

        <h2>Data Member Perpustakaan</h2>
        
        <a href="FormMember.php" class="btn-tambah">+ Tambah Data Member</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor Member</th>
                    <th>Alamat</th>
                    <th>Tgl Mendaftar</th>
                    <th>Tgl Terakhir Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($members)): ?>
                    <?php foreach ($members as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id_member']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_member']); ?></td>
                        <td><?php echo htmlspecialchars($row['nomor_member']); ?></td>
                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($row['tgl_mendaftar']); ?></td>
                        <td><?php echo htmlspecialchars($row['tgl_terakhir_bayar']); ?></td>
                        <td class="action-buttons">
                            <a href="FormMember.php?id_edit=<?php echo $row['id_member']; ?>" class="btn-edit">Edit</a>
                            <a href="Member.php?id_hapus=<?php echo $row['id_member']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="empty-data">Belum ada data member.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>