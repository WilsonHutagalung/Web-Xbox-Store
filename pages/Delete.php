<?php
    require "koneksi.php";
    if(!isset($_SESSION['username'])){
        header("Location: Login.php");
        exit;
    }
    $id = $_GET['id'];
    $get = mysqli_query($conn, "DELETE FROM xbox WHERE id = $id");

    if ($get) {
        echo "
        <script>
            alert('Data Berhasil dihapus!');
            document.location.href = 'Dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'Dashboard.php';
        </script>";
    }
?>