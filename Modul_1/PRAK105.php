<?php
$daftar_samsung = [
    "S22" => "Samsung Galaxy S22",
    "S22plus" => "Samsung Galaxy S22+",
    "A03" => "Samsung Galaxy A03",
    "Xcover" => "Samsung Galaxy Xcover 5"
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 105</title>
    <style>
        table, th, td {
            border: 1px solid black;
            font-family: "Times New Roman", Times, serif;
        }

        th {
            background-color: red; 
            font-weight: bold;
            font-size: 24px;       
            padding: 20px 5px;     
        }

        td {
            padding: 4px;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
     
        <?php 
        foreach ($daftar_samsung as $key => $hp) {
            echo "<tr><td>$hp</td></tr>";
        }
        ?>
    </table>
</body>
</html>