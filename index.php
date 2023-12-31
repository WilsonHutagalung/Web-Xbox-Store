<?php
session_start();
require './pages/Koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM xbox");

$xbox = [];

while ($row = mysqli_fetch_assoc($result)) {
  $xbox[] = $row;
}

if (isset($_SESSION['username'])) {
  $user = $_SESSION['username'];
} else {
  $user = "Guest";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Xbox Homepage Clone</title>
  <link rel="icon" href="./assets/images/additional/Icon.png">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/mobile.css" />
  <link rel="stylesheet" href="./styles/desktop-half.css" />
  <link rel="stylesheet" href="./styles/hamburger.css">
  <script src="./scripts/index.js"></script>
</head>

<body>
  <script type="text/javascript">
    var autoPlay = true;
    var slideIndex;

    function toggleSlider() {
      if (autoPlay == true) {
        autoPlay = false;
        document.getElementById("play-pause-btn").style.backgroundImage =
          "url(./assets/images/slider/nav/play-white.png)";
      } else {
        autoPlay = true;
        document.getElementById("play-pause-btn").style.backgroundImage =
          "url(./assets/images/slider/nav/pause-white.png)";
      }
    }

    window.onload = function() {
      currentSlide(0);
      autoSlide();
    };

    function plusIndex(n) {
      showImage((slideIndex += n));
    }

    function currentSlide(n) {
      showImage((slideIndex = n));
    }

    function autoSlide() {
      if (autoPlay == true) {
        showImage(slideIndex);
        slideIndex++;
      }

      setTimeout(autoSlide, 9000);
    }

    function showImage(n) {
      var slide = document.getElementsByClassName("slide");
      var nav = document.getElementsByClassName("slider-nav-btn");

      if (n > slide.length) {
        slideIndex = 1;
      } else if (n < 1) {
        slideIndex = slide.length;
      }

      for (var i = 0; i < slide.length; i++) {
        slide[i].style.display = "none";
        nav[i].className = nav[i].className.replace(" active", "");
      }

      slide[slideIndex - 1].style.display = "block";
      nav[slideIndex - 1].className += " active";
    }

    function scrollToTop() {
      window.scrollTo(0, 0);
    }
  </script>
  <header>
    <div class="center">
      <div class="header-desktop">
        <div class="flex-row">
          <div class="logo" id="header-microsoft-logo">
            <img src="./assets/images/header/microsoft-logo.png" alt="Microsoft Logo" />
          </div>
          <div class="header-tabs">
            <p class="logo-break">|</p>
            <div class="logo" id="header-xbox-logo">
              <img src="./assets/images/header/xbox-logo.png" alt="Xbox Logo" />
            </div>
            <div class="dropdown-menus">
              <div class="dropdown" id="games">
                <p class="underline-hidden" class="dropdown-text"><a href="./pages/AboutUs.php">About Us</a></p>
                <img src="./assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="devices">
                <p class="underline-hidden" class="dropdown-text"><a href="#Console">Xbox Console</a></p>
                <img src="./assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="community">
                <p class="underline-hidden" class="dropdown-text">
                  <a href="#Contact">Contact</a>
                </p>
                <img src="./assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="my-xbox">
                <p class="underline-hidden" class="dropdown-text"><a href="#Acc">Accessories</a></p>
                <img src="./assets/images/header/more.png" />
              </div>
              <div class="dropdown" id="xbox-support">
                <?php
                if (isset($_SESSION['username'])) {
                  echo "<p class='underline-hidden dropdown-text'><a href='pages/Profile.php?id=$user'>$user</a></p>";
                } else {
                  echo "<p class='underline-hidden' class='dropdown-text'>$user</p>";
                }
                ?>
              </div>
            </div>
          </div>
          <div class="header-misc">
            <div class="nav-icon">
              <a href=<?php
                      if ($user === "guest" or $user === "Guest") {
                        echo "./pages/Login.php";
                      } else {
                        echo "./pages/cart.php";
                      }
                      ?> id="shopping-cart">
                <img src="./assets/images/header/cart1.png" />
              </a>
            </div>
            <div class="nav-icon" id="account">
              <?php
              if (isset($_SESSION['submit'])) {
                echo "<li><a href='pages/Logout.php'><button type='button'>Logout</button></a></li>";
              } else {
                echo "<li><a href='pages/Login.php'><button type='button'>Login</button></a></li>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="header-mobile">
        <div class="flex-row">
          <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
              <span></span>
            </label>
            <ul class="menu__box">
              <li><a class="menu__item" href="./pages/AboutUs.php">About Us</a></li>
              <li><a class="menu__item" href="#Console">Xbox Console</a></li>
              <li><a class="menu__item" href="#Contact">Contact</a></li>
              <li><a class="menu__item" href="#Acc">Accessories</a></li>
            </ul>
          </div>
          <div class="header-tabs">
            <p class="logo-break">&emsp;&emsp;&emsp;</p>
            <div class="logo">
              <img src="./assets/images/header/xbox-logo.png" alt="Xbox Logo" />
            </div>
          <div class="account">
            <div class="nav-icon">
              <a href=<?php
                      if ($user === "guest" or $user === "Guest") {
                        echo "./pages/Login.php";
                      } else {
                        echo "./pages/cart.php";
                      }
                      ?> id="shopping-cart">
                <img src="./assets/images/header/cart1.png" />
              </a>
            </div>
            <div class="nav-icon" id="account">
              <?php
              if (isset($_SESSION['submit'])) {
                echo "<li><a href='pages/Logout.php'><button type='button'>Logout</button></a></li>";
              } else {
                echo "<li><a href='pages/Login.php'><button type='button'>Login</button></a></li>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main>
    <section>
      <div class="slider">
        <div class="slideshow-container">
          <div class="slide" id="slide-1">
            <div class="img-wrapper">
              <div class="info">
                <div class="container">
                  <p class="info-heading">STAR WARS&trade;<br />Squadrons</p>
                  <p class="info-text">Pilots wanted</p>
                  <div class="call-to-action">
                    <div class="call-to-action-highlight">
                      <a href="" style="text-decoration: none; color:white;">
                      <p class="call-to-action-text underline-hidden">
                        BUY NOW
                      </p></a>
                      <img src="./assets/images/additional/more-white-1.png" alt="See more" class="call-to-action-arrow" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="slide" id="slide-2">
            <div class="img-wrapper">
              <div class="info-right white">
                <div class="container">
                  <p class="info-heading">Xbox Series X</p>
                  <p class="info-text">Power your dreams</p>
                  <div class="call-to-action">
                    <div class="call-to-action-highlight">
                      <a href="" style="text-decoration: none; color:white;">
                      <p class="call-to-action-text underline-hidden">
                        LEARN MORE
                      </p></a>
                      <img src="./assets/images/additional/more-white-1.png" alt="See more" class="call-to-action-arrow" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="slide" id="slide-3">
            <div class="img-wrapper">
              <div class="info" style="color: white">
                <div class="container">
                  <p class="info-heading">No Man's Sky</p>
                  <a href="" style="text-decoration:none; color:white;">
                  <p class="info-text">
                    Play it on console or PC with Xbox<br />Game Pass Ultimate
                  </p></a>
                  <div class="call-to-action">
                    <div class="call-to-action-highlight">
                      <p class="call-to-action-text underline-hidden">
                        GET IT NOW
                      </p>
                      <img src="./assets/images/additional/more-white-1.png" alt="See more" class="call-to-action-arrow" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <a class="slider-prev" onclick="plusIndex(-1)">◄</a>
          <a class="slider-next" onclick="plusIndex(+1)">►</a>
        </div>
        <br />
        <div class="slider-nav">
          <div id="play-pause-btn" onclick="toggleSlider()"></div>
          <div class="slider-nav-btn-container">
            <span class="slider-nav-btn" onclick="currentSlide(1)"></span>
            <span class="slider-nav-btn" onclick="currentSlide(2)"></span>
            <span class="slider-nav-btn" onclick="currentSlide(3)"></span>
          </div>
        </div>
      </div>
    </section>
    <div class="Product-us" id="Console">
      <section class="product-us-title">
        <h1 class="ptitle">All Xbox Consoles</h1>
      </section>
      <div class="image">
        <?php
        $i = 1;
        foreach ($xbox as $console) :
          if ($console['role'] == "console") :
        ?>
            <div class="images">
              <img class="gambar" src="./assets/images/img/<?php echo $console['gambar']; ?> " alt="Foto Profil">
              <h3><?php echo $console["nama"] ?></h3>
              <p>$<?php echo $console["harga"] ?></p>
              <h4 class="btn"><a href="./pages/Buy.php?id=<?php echo $console['id']; ?>">BUY NOW</h4>
              <h4 class="btn"><a href="./pages/XboxInfo.php?id=<?php echo $console['id']; ?>">LEARN MORE</a></h4>
            </div>
        <?php $i++;
          endif;
        endforeach;
        ?>
      </div>
      <section class="product-us-title" id="Acc">
        <h1 class="ptitle">Gear up with Xbox accessories</h1>
      </section>
      <div class="image">
        <?php
        $i = 1;
        foreach ($xbox as $console) :
          if ($console['role'] == "accessoris") :
        ?>
            <div class="images">
              <img class="gambar" src="./assets/images/img/<?php echo $console['gambar']; ?> " alt="Foto Profil">
              <h3><?php echo $console["nama"] ?></h3>
              <p>$<?php echo $console["harga"] ?></p>
              <h4 class="btn"><a href="./pages/Buy.php?id=<?php echo $console['id']; ?>">BUY NOW </ow< /h4>
                  <h4 class="btn"><a href="./pages/XboxInfo.php?id=<?php echo $console['id']; ?>">LEARN MORE</a></h4>
            </div>
        <?php $i++;
          endif;
        endforeach;
        ?>
      </div>
  </main>

  <div class="center" id="Contact">
    <div class="follow">
      <p>Follow Xbox</p>
      <img src="./assets/images/footer/email.png" alt="email" />
      <img src="./assets/images/footer/facebook.png" alt="facebook" />
      <img src="./assets/images/footer/twitter.png" alt="twitter" />
      <img src="./assets/images/footer/instagram.png" alt="instagram" />
    </div>
  </div>
  <footer>
    <div class="center">
      <table>
        <tr>
          <th>Xbox</th>
          <th>Fans</th>
          <th>For Developers</th>
        </tr>
        <tr>
          <td><span class="underline-hidden">Feedback</span></td>
          <td><span class="underline-hidden">Xbox Wire</span></td>
          <td><span class="underline-hidden">Games</span></td>
        </tr>
        <tr>
          <td><span class="underline-hidden">Support</span></td>
          <td></td>
          <td><span class="underline-hidden">ID@Xbox</span></td>
        </tr>
        <tr>
          <td>
            <span class="underline-hidden">Photosensitive Seizure Warning</span>
          </td>
          <td></td>
          <td><span class="underline-hidden">Windows 10</span></td>
        </tr>
        <tr>
          <td><span class="underline-hidden">Community Standards</span></td>
          <td></td>
          <td><span class="underline-hidden">Creators Program</span></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td><span class="underline-hidden">Designed for Xbox</span></td>
        </tr>
      </table>
      <div class="bottom-tags">
        <div class="location">
          <img src="./images/footer/earth.png" />
          <p>English (United States)</p>
        </div>
        <div class="tags">
          <p class="underline-hidden">Sitemap</p>
          <p class="underline-hidden">Contact Microsoft</p>
          <p class="underline-hidden">Privacy & cookies</p>
          <p class="underline-hidden">Terms of use</p>
          <p class="underline-hidden">Trademarks</p>
          <p class="underline-hidden">Safety & eco</p>
          <p class="underline-hidden">About our ads</p>
          <p class="underline-hidden">&copy; Microsoft 2023</p>
        </div>
      </div>
    </div>
  </footer>
  <div id="back-to-top" onclick="scrollToTop()">
    <img src="./assets/images/footer/up2.png" alt="Back to top" />
  </div>
</body>

<script>
  document.getElementById("shopping-cart").addEventListener("click", function() {
    let user = "<?php echo $user; ?>";
    if (user === "guest" || user === "Guest") {
      alert('Mohon login terlebih dahulu');
    }
  });
</script>

</html>