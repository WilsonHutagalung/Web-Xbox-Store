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
    <title>Document</title>
</head>
<body>
<h2>Detail Xbox</h2>
<p>Nama: <?php echo $xbox_detail['nama']; ?></p>
<p>Harga: $<?php echo $xbox_detail['harga']; ?></p>
<p>Spesifikasi: $<?php echo $xbox_detail['spesifikasi']; ?></p>
    
</body>
</html>