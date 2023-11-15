<?php
  require 'koneksi.php';
  session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../styles/style.css"> -->
    <link rel="stylesheet" href="../styles/cart.css">
    <title>Payment Cart</title>
</head>
<body>

<div class="container">
    <main>
      <h1>Cart</h1>
      <div class="basket">
        <div class="basket-labels">
          <ul>
            <li class="item item-heading">Barang</li>
            <li class="price">Harga</li>
            <li class="quantity">Kuantitas</li>
            <li class="subtotal">Subtotal</li>
          </ul>
        </div>
        <!-- <?php foreach ($carts as $cart) : ?>
          <div class="basket-product">
            <div class="item">
              <div class="product-image">
                <img src="../resources/img/<?= $cart['photo'] ?>" alt="Placholder Image 2" class="product-frame">
              </div>
              <div class="product-details">
                <h2>
                  <span class="item-quantity">
                    <?= $cart['quantity'] ?>
                  </span> <?= $cart['name'] ?>
                </h2>
              </div>
            </div>
            <div class="price"><?= $cart['price'] ?></div>
            <div class="quantity">
              <form action="update_quantity.php" method="post" class="quantity-form">
                <input type="hidden" name="id" value="<?=$cart['id'] ?>">
                <input type="number" name="quantity" value="<?= abs($cart['quantity']) ?>" min="1" class="quantity-field">
              </form>
            </div>
            <div class="subtotal"><?= $cart['price'] * $cart['quantity'] ?></div>
            <input type="hidden" name="id" value="<?= $cart['id'] ?>">
            <div class="remove">
              <a href="delete.php?id=<?= $cart["id"] ?>" onclick="return confirm('Apakah anda ingin menghapus barang ini dari keranjang?')">
                <button>Remove</button>
              </a>
            </div>
          </div>
        <?php endforeach ?> -->
      </div>

      <form action="" method="post">
        <aside>
          <div class="summary">
            <div class="summary-total-items"></div>
            <div class="summary-subtotal">
              <div class="subtotal-title">Subtotal</div>
              <div class="subtotal-value final-value" id="basket-subtotal"></div>
            </div>
            <div class="summary-total">
              <div class="total-title">Total</div>
              <div class="total-value final-value" id="basket-total"></div>
              <input class="total-value final-value" id="basket-total-hidden" type="hidden" name="totalPrice">
            </div>
            <div class="summary-checkout">
              <button type="submit" class="checkout-cta" name="btnCheckout">Checkout</button>
            </div>
          </div>
        </aside>
      </form>
    </main>
  </div>
  <script src="../scripts/paymentcart.js"></script>
</body>
</html>