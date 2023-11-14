<?php
require 'koneksi.php';
$xbox_id = $_GET['id'];

// Lakukan query untuk mengambil detail Xbox dengan ID yang sesuai
$query = "SELECT * FROM xbox WHERE id = $xbox_id";
$result = mysqli_query($conn, $query);

// Ambil data dari hasil query
$xbox_detail = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
</head>
<body>
<!-- <h2>Detail Xbox</h2> -->
<div style="display: flex; justify-content: center; align-items: center;">
    <img src="../assets/images/img/<?php echo $xbox_detail['gambar']; ?>" alt="Foto Profil" style="max-width: 70%;">
</div>
<div class="information">
    <div class="name">
        <h2><?php echo $xbox_detail['nama']; ?></h2>
    </div>
    <p> $<?php echo $xbox_detail['harga']; ?></p>
    <p> Stok: <?php echo $xbox_detail['stok']; ?></p>
    <p>Spesifikasi:<?php echo $xbox_detail['spesifikasi']; ?></p>
</div>
    
</body>
</html>