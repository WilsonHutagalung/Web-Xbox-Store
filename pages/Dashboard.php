<?php
session_start();
require "koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM xbox");
date_default_timezone_set("Asia/Makassar");
$day = date('l');
$date = date('d');
$month = date('F');
$year = date('Y');
$time = date('H:i:s');
$timeZone = date('T');


$xbox = [];

while ($row = mysqli_fetch_assoc($result)) {
    $xbox[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/Dashboard.css">
    <link rel="stylesheet" href="../styles/desktop-half.css"/>
    <title>Database</title>
</head>

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
              <div class="dropdown" id="game-pass">
                <p class="underline-hidden" class="dropdown-text">
                  Game Pass
                </p>
                <img src="../assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="devices">
                <p class="underline-hidden" class="dropdown-text">Devices</p>
                <img src="../assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="community">
                <p class="underline-hidden" class="dropdown-text">
                  Community
                </p>
                <img src="../assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="my-xbox">
                <p class="underline-hidden" class="dropdown-text">My Xbox</p>
                <img src="../assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="xbox-support">
                <p class="underline-hidden" class="dropdown-text">
                  Xbox Support
                </p>
                <img src="../assets/images/header/more.png" />
              </div>
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
                <?php
                if (isset($_SESSION['submit'])) {
                  echo "<li><a href='Logout.php'><button type='button'>Logout</button></a><h3></h3></li>";
                } else {
                  echo "<li><a href='Login.php'><button type='button'>Login</button></a><h3></h3></li>";
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </header>
    <div class="container">
    <p>Current Date: <?php echo $day . ', ' . $date . ' ' . $month . ' ' . $year; ?></p>
    <p id="clock"><?php echo sprintf("Time Zone: %s %s", $time, $timeZone); ?></p>
        <h2>Data Xbox Consoles</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Xbox</th>
                    <th>Harga Xbox</th>
                    <th>Stok Xbox</th>
                    <th>Spec Xbox</th>
                    <th>Jenis Barang</th>
                    <th>Path Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($xbox as $console) : ?>
                    <tr>
                        <td><?php echo $console["nama"] ?></td>
                        <td><?php echo $console["harga"] ?></td>
                        <td><?php echo $console["stok"] ?></td>
                        <td><?php echo $console["spesifikasi"] ?></td>
                        <td><?php echo $console["role"] ?></td>
                        <td><?php echo $console["gambar"] ?></td>
                        <td>
                        <!--  -->
                        <a href="Update.php?id=<?php echo $console["id"] ?>"><button class="edit-button" id="edit-btn">Edit</button></a>
                        <a href="delete.php?id=<?php echo $console["id"] ?>"><button name="delete-button" class="delete-btn">Delete</button></a>
                        </td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
        <div class="popup-container">
        <a href="Create.php"><button class="add-button" id="edit-btn">Tambah</button></a>
        </div>
    </div>
    <script>
       

        function updateClock() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            hours = (hours < 10 ? "0" : "") + hours;
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            var timeString = hours + ":" + minutes + ":" + seconds;
            document.getElementById("clock").textContent = "Time Zone: " + timeString + " <?php echo $timeZone; ?>";
        }
        setInterval(updateClock, 1000);
    </script>
</body>
</html>