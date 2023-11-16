<?php
    require "koneksi.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "DELETE FROM keranjang WHERE id_item = $id");

    if ($get) {
        echo "
        <script>
            alert('Data Berhasil dihapus!');
            document.location.href = 'cart.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'cart.php';
        </script>";
    }
?>