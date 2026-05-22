<?php
$mahasiswa = [
    [
        "no" => 1,
        "nama" => "Ridho",
        "matkul" => [
            ["nama_mk" => "Pemrograman I", "sks" => 2],
            ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "no" => 2,
        "nama" => "Ratna",
        "matkul" => [
            ["nama_mk" => "Basis Data I", "sks" => 2],
            ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
            ["nama_mk" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "no" => 3,
        "nama" => "Tono",
        "matkul" => [
            ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama_mk" => "Komputasi Awan", "sks" => 3],
            ["nama_mk" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

foreach ($mahasiswa as &$mhs) {
    $total_sks = 0;
    foreach ($mhs["matkul"] as $mk) {
        $total_sks += $mk["sks"];
    }
    $mhs["total_sks"] = $total_sks;

    if ($total_sks < 7) {
        $mhs["keterangan"] = "Revisi KRS";
        $mhs["warna"] = "#ff0000";
    } else {
        $mhs["keterangan"] = "Tidak Revisi";
        $mhs["warna"] = "#00b050";
    }
}
unset($mhs);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK403</title>
    <style>
        table {
            border-collapse: collapse;
            font-family: serif;
        }
        th, td {
            border: 1px solid black;
            padding: 4px 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #cccccc;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Kuliah diambil</th>
            <th>SKS</th>
            <th>Total SKS</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs): ?>
            <?php foreach ($mhs["matkul"] as $index => $mk): ?>
                <tr>
                    <?php if ($index === 0): ?>
                        <td><?php echo htmlspecialchars($mhs["no"]); ?></td>
                        <td><?php echo htmlspecialchars($mhs["nama"]); ?></td>
                    <?php else: ?>
                        <td></td>
                        <td></td>
                    <?php endif; ?>
                    
                    <td><?php echo htmlspecialchars($mk["nama_mk"]); ?></td>
                    <td><?php echo htmlspecialchars($mk["sks"]); ?></td>
                    
                    <?php if ($index === 0): ?>
                        <td><?php echo htmlspecialchars($mhs["total_sks"]); ?></td>
                        <td style="background-color: <?php echo $mhs['warna']; ?>;"><?php echo htmlspecialchars($mhs["keterangan"]); ?></td>
                    <?php else: ?>
                        <td></td>
                        <td></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>

</body>
</html>