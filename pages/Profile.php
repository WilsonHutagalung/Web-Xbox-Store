<?php
session_start();
require 'koneksi.php';
$username1 = $_SESSION['username'];

if(!isset($_SESSION['username'])){
    header("Location: Login.php");
    exit;
}

if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $password = password_hash($password,PASSWORD_DEFAULT);
    $result  = mysqli_query($conn,"SELECT username from akun WHERE username = '$username' ");
    if(mysqli_fetch_assoc($result)){
        echo "<script> alert('username sudah ada !!!');
        document.location.href='Profile.php';
        </script>";
    }else{
        $sql = "UPDATE akun SET password = '$password', username = '$username' WHERE username = '$username1'";
        $result_query = mysqli_query($conn,$sql);

        if(mysqli_affected_rows($conn) > 0){
            session_destroy();
            echo "<script> alert('Data Berhasil diubah!! Silahkan login Kembali');
            document.location.href='Login.php';
            </script>";
        }else{
            echo "<script> alert('Data gagal diubah!!');
            document.location.href='Profile.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/profile.css">
    <title>Edit Profile</title>
</head>
<body>

    <div class="container">
        <h2>Edit Profile</h2>
        <form action="" method="POST"> 
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Your username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password"placeholder="Your password" required>
            <button type="submit" name="submit">Save Changes</button>
        </form>
    </div>

</body>
</html>
