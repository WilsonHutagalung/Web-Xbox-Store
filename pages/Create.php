<!--  -->

<?php
require 'koneksi.php';
date_default_timezone_set("Asia/Makassar");


if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_xbox'];
    $harga = $_POST['harga_xbox'];
    $stok = $_POST['stok_xbox'];
    $desc = $_POST['spec_xbox'];
    $img = $_FILES["file"]["name"];
    $tempName = $_FILES["file"]["tmp_name"];

    $tanggal = date('Y-m-d');
    $x = explode('.', $img);
    $ekstensi = strtolower(end($x));
    
    $new_foto = $tanggal." ".$nama.".".$ekstensi;
    $temp_file = $_FILES['file']['tmp_name']; 

    // Pindahkan file dengan nama baru
    move_uploaded_file($temp_file, "../assets/images/img/".$new_foto);

    // move_uploaded_file($tempName, "image/" . $img);
    
    $query = "INSERT INTO xbox VALUES ('','$nama', '$stok', '$harga','$desc','$new_foto')";
    if (mysqli_query($conn, $query)) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'Dashboard.php'
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'Dashboard.php'
        </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link rel="stylesheet" href="../styles/CRUD.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Tambah Data</h1><hr><br>
            <form action="" method="POST" name="tambah" enctype="multipart/form-data">
                <label for="nama">Nama XBOX</label>
                <input type="text" name="nama_xbox" class="textfield" required>
                <label for="harga">Harga</label>
                <input type="text" name="harga_xbox" class="textfield" required>
                <label for="stok">Stok</label>
                <input type="number" name="stok_xbox" class="textfield" required>
                <label for="Spesifikasi">Spesifikasi</label>
                <input type="text" name="spec_xbox" class="textfield" required>
                <!-- BIKIN UNTUKINPUTAN FILE -->
                <p>add image : <input type="file" name="file" required> </p>
                <input type="submit" name="tambah" name="spn" value="Tambah Data" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>