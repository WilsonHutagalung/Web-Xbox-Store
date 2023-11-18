<?php
require 'koneksi.php';

if(isset($_POST['update'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    if($password == $cpassword){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $update_query = "UPDATE akun SET password = '$password' WHERE username = '$username'";
        $result = mysqli_query($conn, $update_query);

        if($result){
            echo "<script> alert('Password berhasil diperbarui!');
            document.location.href='Login.php';
            </script>";
        } else {
            echo "<script> alert('Gagal memperbarui password!');
            document.location.href='ChangePass.php';
            </script>";
        }
    } else {
        echo "<script> alert('Password tidak sama!');
        document.location.href='ChangePass.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/additional/Icon.png">
    <title>Change Password</title>
    <link rel="stylesheet" href="../styles/Form.css">
</head>
<body>
    <?php echo isset($row); ?>
    <div class="wrapper">
        <?php
        if(isset($error)){
            echo "<p style='color:red';> username atau password anda salah </p>";
        }?>
        <form action="" method="POST">
            <h1>Change Password</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="New password" required>
            </div>
            <div class="input-box">
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" autocomplete="off"  required>
            </div>
            <button type="submit" name="update" class="btn">Update</button>
        </form>
    </div>
</body>
</html>