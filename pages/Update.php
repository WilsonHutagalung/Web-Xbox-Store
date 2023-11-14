<?php
    require "koneksi.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "SELECT * FROM xbox WHERE id = $id");
    $console = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $console[] = $row;
    }
    $console = $console[0];

    if (isset($_POST['update'])) {
        $nama = $_POST['nama_xbox'];
        $harga = $_POST['harga_xbox'];
        $stok = $_POST['stok_xbox'];
        $desc = $_POST['spec_xbox'];
        $role = isset($_POST['role']) ? $_POST['role'] : array();
        $roleStr = is_array($role) ? implode(",", $role) : $role;
        $gambar = $_FILES['file']['name'];
        $temp_file = $_FILES['file']['tmp_name'];
        $extension = pathinfo($gambar, PATHINFO_EXTENSION);
        $date = date("Y-m-d");
        $nama_file = $date . " " . $nama . "." . $extension;
        move_uploaded_file($temp_file, "../assets/images/img/".$nama_file); 

        $result = mysqli_query($conn, "UPDATE xbox SET nama='$nama', harga='$harga', 
                                        stok='$stok', spesifikasi='$desc', role='$roleStr', gambar='$nama_file' WHERE id = $id");

        if ($result) {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'Dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'Dashboard.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
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
            <h1>Update Data</h1>
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
            <button type="submit" name="update" class="btn">Update</button>
        </form>
    </div>
</body>
</html>