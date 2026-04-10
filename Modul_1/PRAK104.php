<?php
$smartphones = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum 104</title>
    <style>
        table, th, td {
            border: 1px solid black;
            font-family: "Times New Roman", Times, serif;
        }
        
        th, td {
            padding: 4px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <table>
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        
        <?php 
        foreach ($smartphones as $hp) {
            echo "<tr><td>$hp</td></tr>";
        }
        ?>
    </table>
</body>
</html>