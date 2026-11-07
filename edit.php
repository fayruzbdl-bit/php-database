<?php
// BUAT KONEKSI KE DATABASE
require "database.php";

// Menangkap id dari URL
$id = $_GET['id'];

$sql = "SELECT * FROM mahasiswa WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$mhs = $stmt->fetch();

$pesan = "";

if (isset($_POST['edit'])) {
   $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $email = $_POST['email'];

    if (!empty($nim) && !empty($nama) && !empty($email)) {
      try {
         $sql = "UPDATE mahasiswa SET nim = :nim, nama = :nama, email = :email WHERE id = :id";
         $stmtUpdate = $pdo->prepare($sql);
         
         $stmtUpdate->execute([
                ':nim'   => $nim,
                ':nama'  => $nama,
                ':email' => $email,
                ':id'    => $id
         ]);

         header("Location: index.php");
         exit;
      } catch (\PDOException $e) {
         $pesan = "<p style='color: red;'>Gagal mengupdate data: " . $e->getMessage() . "</p>";
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
    <style>
      li {
         list-style: none;
         margin-bottom: 10px;
      }
      label {
         display: inline-block;
         width: 70px;
      }
   </style>
</head>
<body>
   <h1>Form Edit data</h1>

<!-- Menampilkan pesan error jika ada -->
   <?php echo $pesan; ?>


   <form action="" method="POST">
   <ul>
      <li>
         <label for="nim">NIM :</label>
         <input type="text" name="nim" id="nim" value="<?= $mhs['nim'] ?>" required>
         <!-- $_POST['nim'] -->
      </li>
      <li>
         <label for="nama">Nama :</label>
         <input type="text" name="nama" id="nama" value="<?= $mhs['nama'] ?>" required>
         <!-- $_POST['nama'] -->

      </li>
      <li>
         <label for="email">Email :</label>
         <input type="text" name="email" id="email" value="<?= $mhs['email'] ?>" required>
         <!-- $_POST['email'] -->

      </li> 
      <li>
         <button type="submit" name="edit">Edit</button>
         <!-- $_POST['edit'] -->
      </li>
   </ul>
   </form>
</body>
</html>