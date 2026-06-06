<?php
function koneksi() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "prak501";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Koneksi database gagal: " . $e->getMessage();
        die();
    }
}
?>