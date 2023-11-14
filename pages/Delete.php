<?php
    require "koneksi.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "DELETE FROM xbox WHERE id = $id");

    if ($get) {
        header('location: Dashboard.php');
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'Dashboard.php';
        </script>";
    }
?>