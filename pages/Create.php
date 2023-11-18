<!--  -->

<?php
require 'koneksi.php';

date_default_timezone_set("Asia/Makassar");


if (isset($_POST['tambah'])) {
    $nama = $_POST['nama_xbox'];
    $harga = $_POST['harga_xbox'];
    $stok = $_POST['stok_xbox'];
    $desc = $_POST['spec_xbox'];
    // Ngecek apakah udah dicheck atau belum, kalau belum jadi arr kosong
    $role = isset($_POST['role']) ? $_POST['role'] : array();
    // Ngecek apakah array atau bukan, kalau iya jadiin string dengan pemisah koma
    $roleStr = is_array($role) ? implode(",", $role) : $role;
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
    
    $query = "INSERT INTO xbox VALUES ('','$nama', '$stok', '$harga','$desc','$roleStr','$new_foto')";
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
    <link rel="icon" href="../assets/images/additional/Icon.png">
    <title>Tambah</title>
    <link rel="stylesheet" href="../styles/Form.css">
</head>
<body>
    <?php echo isset($row); ?>
    <div class="wrapper">
        <?php
        if(isset($error)){
            echo "<p style='color:red';> username atau password anda salah </p>";
        }?>
        <form action="" method="POST" enctype="multipart/form-data">
            <h1>Tambah Data</h1>
            <div class="input-box">
                <input type="text" name="nama_xbox" placeholder="Nama Xbox Console" required>
            </div>
            <div class="input-box">
                <input type="text" name="harga_xbox" placeholder="Harga" required>
            </div>
            <div class="input-box">
                <input type="number" name="stok_xbox" placeholder="Stok" required>
            </div>
            <div class="input-box">
                <input type="text" name="spec_xbox" placeholder="Spesifikasi" required>
            </div>
            <div>
                <input type="radio" name="role" value="console" required>Console 
                <input type="radio" name="role" value="accessoris" required>Accessoris
            </div>
            <div class="input-box">
            <p><input type="file" name="file" required></p>
            </div>
            <br>
            <button type="submit" name="tambah" class="btn">Tambah</button>
        </form>
    </div>
</body>
</html>