<?php
$host     = "localhost"; //laptop kita
$username = "root"; //
$password = ""; //
$database = "learned"; //

$dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";

try {
   // DRIVER UNTUK KONEK KE DATABASE
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,            PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,   false);

   //  echo "sukses koneksi ke database";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>