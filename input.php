<?php
require "database.php";

$pesan = "";

// 2. Proses Insert Data saat form di-submit
if (isset($_POST['submit'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $email = $_POST['email'];

    if (!empty($nim) && !empty($nama) && !empty($email)) {
        try {
            // Menggunakan Prepared Statement untuk keamanan (mencegah SQL Injection)
            $sql = "INSERT INTO mahasiswa (nim, nama, email) VALUES (:nim, :nama, :email)";
            $stmt = $pdo->prepare($sql);
            
            // Eksekusi query dengan parameter
            $stmt->execute([
                ':nim'   => $nim,
                ':nama'  => $nama,
                ':email' => $email
            ]);

            $pesan = "<p style='color: green;'>Data mahasiswa berhasil disimpan!</p>";
            header("Location: index.php");
            exit;
        } catch (\PDOException $e) {
            $pesan = "<p style='color: red;'>Gagal menyimpan data: " . $e->getMessage() . "</p>";
        }
    } else {
        $pesan = "<p style='color: red;'>Harap isi semua kolom!</p>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Input Data Mahasiswa</h1>
    <?php echo $pesan; ?>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nim":>NIM</label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
            <button type="submit" name="submit">Save</button>
            </li>
        </ul>
    </form>
</body>
</html>