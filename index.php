<?php
require "database.php";

$query = $pdo->query("SELECT * FROM mahasiswa");
$data = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Data Mahasiswa - Brutalism Style</title>
   <style>
      body {
         font-family: 'Courier New', Courier, monospace;
         background-color: #f4f4f0;
         padding: 40px;
      }

      /* Container / Wrapper tabel ala Brutalism */
      .table-container {
         max-width: 800px;
         margin: 0 auto;
      }

      table {
         width: 100%;
         border-collapse: collapse;
         background-color: #ffffff;
         border: 4px solid #000000;
         /* Efek bayangan tegas khas Neo-Brutalism */
         box-shadow: 6px 6px 0px #000000; 
      }

      th {
         background-color: #FFDE59; /* Kuning terang khas brutalism */
         color: #000000;
         border: 3px solid #000000;
         padding: 14px;
         font-size: 16px;
         text-transform: uppercase;
         letter-spacing: 1px;
      }

      td {
         border: 3px solid #000000;
         padding: 12px 14px;
         font-size: 15px;
         color: #000000;
      }

      /* Efek hover baris tabel */
      tr:hover td {
         background-color: #ffeaa7;
      }
   </style>
</head>
<body>

<nav>
      <a href="/input.php">Tambah Data</a>
</nav>

   <div class="table-container">
      <table>
         <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Action</th>
         </tr>
         
         <?php 
         $no = 1;
         foreach ($data as $row): 
         ?> 
         <tr>
            <td><?= $no++; ?></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><a href="/edit.php?id=<?= $row['id'] ?>">Edit</a></td>
         </tr>
         <?php endforeach; ?>
      </table>
   </div>

</body>
</html>