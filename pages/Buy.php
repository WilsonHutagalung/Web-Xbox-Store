<?php
require 'koneksi.php';
session_start();
$xbox_id = $_GET['id'];
if(isset($_SESSION['submit'])){
    $username = $_SESSION['username'];
}else{
  echo "<script> alert('Anda Harus Login Terlebih Dahulu')
  document.location.href='Login.php';
  </script>";
}

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
    <link rel="stylesheet" href="../styles/mobile.css" />
    <link rel="stylesheet" href="../styles/desktop-half.css" />
    <title>Document</title>
</head>
<body>
<header>
    <div class="center">
      <div class="header-desktop">
        <div class="flex-row">
          <div class="logo" id="header-microsoft-logo">
            <img src="../assets/images/header/microsoft-logo.png" alt="Microsoft Logo" />
          </div>
          <div class="header-tabs">
            <p class="logo-break">|</p>
            <div class="logo" id="header-xbox-logo">
              <img src="../assets/images/header/xbox-logo.png" alt="Xbox Logo" />
            </div>
            <div class="dropdown-menus">
              <div class="dropdown" id="games">
                <p class="underline-hidden" class="dropdown-text">Home</p>
                <img src="../assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="devices">
                <p class="underline-hidden" class="dropdown-text">My Box</p>
                <img src="../assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="community">
                <p class="underline-hidden" class="dropdown-text">
                  About Us
                </p>
                <img src="../assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="my-xbox">
                <p class="underline-hidden" class="dropdown-text">Devices</p>
                <img src="../assets/images/header/more.png" />
              </div>
              <!-- <div class="dropdown" id="xbox-support">
                <p class="underline-hidden" class="dropdown-text">
                  Xbox Support
                </p>
                <img src="../assets/images/header/more.png" />
              </div> -->
            </div>
          </div>
          <div class="header-misc">
            <div class="nav-icon" id="search">
              <img src="../assets/images/header/search1.png" />
            </div>
            <div class="nav-icon" id="shopping-cart">
              <img src="../assets/images/header/cart1.png" />
            </div>
            <div class="nav-icon" id="account">
              <!-- <div class="profile-icon"> -->
                <!-- <img src="./images/header/master-chief.jpg" /> -->
                <?php
                if (isset($_SESSION['submit'])) {
                  echo "<li><a href='../pages/Logout.php'><button type='button'>Logout</button></a><h3></h3></li>";
                } else {
                  echo "<li><a href='../pages/Login.php'><button type='button'>Login</button></a><h3></h3></li>";
                }
                ?>
              <!-- </div> -->
            </div>
          </div>
        </div>
      </div>
      <div class="header-mobile">
        <div class="flex-row">
          <div class="nav">
            <div class="nav-icon">
              <img src="./assets/images/header/stack-1.png" />
            </div>
            <div class="nav-icon">
              <img src="./assets/images/header/search1.png" />
            </div>
          </div>
          <div class="logo">
            <img src="../assets/images/header/microsoft-logo.png" />
          </div>
          <div class="account">
            <div class="nav-icon" id="shopping-cart">
              <img src="../assets/images/header/cart1.png" />
            </div>
            <div class="nav-icon" id="account">
                <!-- <img src="./images/header/master-chief.jpg" /> -->
                <?php
                if (isset($_SESSION['submit'])) {
                  echo "<li><a href='pages/Logout.php'><button type='button'>Logout</button></a><h3></h3></li>";
                } else {
                  echo "<li><a href='pages/Login.php'><button type='button'>Login</button></a><h3></h3></li>";
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
<!-- <h2>Detail Xbox</h2> -->
<div style="display: flex; justify-content: center; align-items: center; margin-bottom: 60px; margin-top:40px">

<!-- Gambar Utama -->
<div style="flex: 1;">
    <img src="../assets/images/img/<?php echo $xbox_detail['gambar']; ?>" alt="Foto Profil" style="max-width: 100%;">
</div>

<!-- Gambar Samping -->
<div style="display: flex; flex-direction: column; margin-left: 40px; align-items: center; margin-top:50px">
    <img src="../assets/images/img/<?php echo $xbox_detail['gambar']; ?>" alt="Foto Profil" style="width: 30%;">
    <img src="../assets/images/img/<?php echo $xbox_detail['gambar']; ?>" alt="Foto Profil" style="width: 30%;">
    <img src="../assets/images/img/<?php echo $xbox_detail['gambar']; ?>" alt="Foto Profil" style="width: 30%;">
</div>

</div>



<div class="Containers" style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">

    <div class="information" style="flex: 1;">

        <div class="name">
            <h2><?php echo $xbox_detail['nama']; ?></h2>
        </div>
        <div class="details">
            <p> $<?php echo $xbox_detail['harga']; ?></p>
            <p> Stok: <?php echo $xbox_detail['stok']; ?></p>
            <p>Spesifikasi: <?php echo $xbox_detail['spesifikasi']; ?></p>
        </div>

    </div>

    <div class="Cart">
        <p><a href="../index.php" id="addToCart">Tambahkan Ke Keranjang</a></p>
    </div>

</div>

<script>
  document.getElementById("addToCart").addEventListener("click", function() {
    <?php if (!isset($_SESSION['submit'])) {
      echo "alert('Anda Harus Login Terlebih Dahulu')";
    } else {
      $usernameAkun = $_SESSION['username'];
      $query2 = "SELECT * FROM keranjang WHERE username = '$usernameAkun'";
      $result2 = mysqli_query($conn, $query2);
      $cartfetched = mysqli_fetch_assoc($result2);

      $jumlah = (int)$cartfetched['jumlah'];
      if ($jumlah == 1) {
        $jumlah += 1;
        $query = "UPDATE keranjang SET jumlah = $jumlah WHERE id_item = $xbox_id";
      } else {
        $query = "INSERT INTO keranjang VALUES ('', '$username', '$xbox_id', 1)";
      }
      mysqli_query($conn, $query);
      echo "alert('Xbox Berhasil Ditambahkan Ke Keranjang')";
    } ?>
  });
</script>

</body>
</html>