<?php
$mahasiswa = [
    [
        "nama" => "Andi",
        "nim" => "2101001",
        "uts" => 87,
        "uas" => 65
    ],
    [
        "nama" => "Budi",
        "nim" => "2101002",
        "uts" => 76,
        "uas" => 79
    ],
    [
        "nama" => "Tono",
        "nim" => "2101003",
        "uts" => 50,
        "uas" => 41
    ],
    [
        "nama" => "Jessica",
        "nim" => "2101004",
        "uts" => 60,
        "uas" => 75
    ]
];

foreach ($mahasiswa as &$mhs) {
    $mhs["akhir"] = (0.4 * $mhs["uts"]) + (0.6 * $mhs["uas"]);

    if ($mhs["akhir"] >= 80) {
        $mhs["huruf"] = "A";
    } elseif ($mhs["akhir"] >= 70 && $mhs["akhir"] <= 79) {
        $mhs["huruf"] = "B";
    } elseif ($mhs["akhir"] >= 60 && $mhs["akhir"] <= 69) {
        $mhs["huruf"] = "C";
    } elseif ($mhs["akhir"] >= 50 && $mhs["akhir"] <= 59) {
        $mhs["huruf"] = "D";
    } else {
        $mhs["huruf"] = "E";
    }
}
unset($mhs);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PRAK402</title>
    <style>
        table {
            border-collapse: collapse;
            font-family: sans-serif;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
            width: 100px;
        }
        th {
            background-color: #ccc;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs): ?>
            <tr>
                <td><?php echo htmlspecialchars($mhs["nama"]); ?></td>
                <td><?php echo htmlspecialchars($mhs["nim"]); ?></td>
                <td><?php echo htmlspecialchars($mhs["uts"]); ?></td>
                <td><?php echo htmlspecialchars($mhs["uas"]); ?></td>
                <td><?php echo htmlspecialchars($mhs["akhir"]); ?></td>
                <td><?php echo htmlspecialchars($mhs["huruf"]); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>