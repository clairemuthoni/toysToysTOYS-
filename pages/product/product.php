<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="product.css">
  <title>Toys</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>

<body>
  <!-- The Header for the Webpage -->
  <header>
    <a href="..\homepage\home.php" class="logo-text">TOYS</a>
    <div class="nav-search-bar">
      <input class="nav-search-text-field" type="text" placeholder="What are you looking for?" name="user_search" id="search">
      <a href=""><img class="nav-search-button" src="..\..\assets\icons\search-filled.png" alt="search"></a>
    </div>
    <div class="nav-buttons">
      <a href=""><img class="nav-link help-icon" src="..\..\assets\icons\help.png" alt="help"></a>
      <a href="..\login\login.php">
        <div class="nav-account">
          <img class="nav-link " src="..\..\assets\icons\user.png" alt="account">
          <p>
            <?php
            session_start();
            if (isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
              echo "Hi, " . $_SESSION['first_name'];
            } else {
              echo "Login";
            }
            ?>
          </p>
        </div>
      </a>
      <a href="..\cart\cart.php"><img class="nav-link cart" src="..\..\assets\icons\cart.png" alt="cart"></a>
    </div>
  </header>

  <?php
  require('..\..\middlewares\connection.php');
  $id = $_GET['id'];

  $sql = " SELECT * FROM products WHERE product_id = $id";
  $result = mysqli_query($conn, $sql)

  ?>
  <?php
  while ($row = mysqli_fetch_assoc($result)) {
    $sql = "SELECT `image_url` FROM product_images where `image_id` = " . $row['image_id'];
    $result = mysqli_query($conn, $sql);
    $images = mysqli_fetch_all($result);

    if (!isset($row['seller_id'])) {
      $row['seller_id'] = 1;
    }

    $sql = "SELECT * FROM sellers where `seller_id` = " . $row['seller_id'];
    $result = mysqli_query($conn, $sql);
    $seller = mysqli_fetch_assoc($result);

    // if(isset($_GET['cart'])){
    //   $id = $_GET['id'];

    //   $sql = " SELECT * FROM products WHERE product_id = $id";
    //   $result = mysqli_query($conn, $sql);
    //   $row = mysqli_fetch_assoc($result);

    //   $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    //   array_push($cart, $row);
    //   $_SESSION['cart'] = $cart;
    // }

    function OrderID($conn){            // Check if there are any pending orders, else make a new order id

      if (isset($_SESSION["order_id"])){
          return $_SESSION["order_id"];
      }
      $query = "SELECT `order_id` FROM `orders` WHERE `order_status` = 'Pending' AND `user_id` = ".$_SESSION["user_id"].";";
      $result = mysqli_query($conn, $query);
      $row = mysqli_fetch_row($result);
      if ($row[0]){
          $_SESSION["order_id"] = $row[0];
          return $row[0];
      }
      else{   // Make a new entry in the tbl_order table

          $order_sql = "INSERT INTO `orders` (`order_id`, `user_id`, `order_status`, `order_price`, `updated_at`, `is_deleted`)
           VALUES (NULL, '".$_SESSION["user_id"]."', 'Pending', '0', '".date('Y-m-d H:i:s')."', '0')";
          mysqli_query($conn, $order_sql);
          $_SESSION["order_id"] = CheckOrderID($conn);
          return $_SESSION["order_id"];
      }
  }

  function CheckOrderID($conn){
    $query = "SELECT MAX(order_id) FROM orders WHERE user_id=".$_SESSION['user_id'];
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    // $user_id = ($row[0] + 1);
    return ($row[0]);
}

    if (isset($_GET["cart"])){
      //  Check if user is logged in first
      require('..\..\middlewares\user_guard.php');

      $id = $_GET["cart"];
      $sql = "SELECT * FROM products WHERE product_id = $id";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      $order_id = OrderID($conn);
      $customer_id = $user_id;
      $product_price = $row["product_price"];

      $orderdetails_sql = "INSERT INTO `orderdetails` (`orderdetails_id`, `order_id`, `product_id`, `product price`, `order_quantity`, `created_at`, `updated_at`)
       VALUES (NULL, '$order_id', '$id', '$product_price', '1', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."') ";
      
      mysqli_query($conn, $orderdetails_sql);
      $order_sql = "UPDATE `orders` SET `updated_at` = '".date('Y-m-d H:i:s')."' WHERE `order_id` = $order_id;";
      mysqli_query($conn, $order_sql);
      header("Location:".$_SERVER["HTTP_REFERER"]);
      exit();
      

  }

  ?>


    <div class="image">
      <!-- Slider main container -->
      <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide"><img src="..\..\assets\product-images\<?php echo $images[0][0] ?>"></div>
          <div class="swiper-slide"><img src="..\..\assets\product-images\<?php echo $images[1][0] ?>"></div>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
    <p class="name"> <?php echo $row['product_name'] ?></p>
    <p class="retailers"> <?php echo $seller['company_name'] ?></p>
    <p class="price">Kshs <?php echo $row['product_price'] ?></p>
    <a class="button-1" href="product.php?id=<?php echo $row['product_id'] ?>&cart=<?php echo $row['product_id'] ?>">ADD TO CART</a>
    <p class="description"> Description</p>
    <p class="description1"><?php echo $row['product_description'] ?></p>


    <!-- Add your page specific code here -->
    <footer>
      <div class="footer-list-1">
        <a href="..\homepage\home.php" class="logo-text">TOYS</a>
        <div class="footer-social-media-links">
          <a href="https://www.facebook.com/"><img class="icon-facebook" src="..\..\assets\icons\facebook.png" alt="facebook"></a>
          <a href="https://www.instagram.com/"><img class="icon-instagram" src="..\..\assets\icons\instagram.png" alt="instagram"></a>
          <a href="https://www.twitter.com/"><img class="icon-twitter" src="..\..\assets\icons\twitter.png" alt="twitter"></a>
        </div>
        <p class="footer-copyright">©2022. Toys</p>
      </div>

      <div class="footer-list-2">
        <p class="footer-title">INFO</p>
        <a href="">ABOUT US</a>
        <a href="">CONTACT US</a>
        <a href="">WORK WITH US</a>
        <a href="">PRIVACY POLICY</a>
      </div>

      <div class="footer-list-3">
        <p class="footer-title">CUSTOMER CARE</p>
        <a href="">SHIPPING</a>
        <a href="">RETURNS</a>
        <a href="">GIFT CARDS</a>
        <a href="">OUTLET</a>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
      const swiper = new Swiper('.swiper', {
        autoplay: {
          delay: 1400,
          disableOnInteraction: false,
        },
        loop: true,

        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },

        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },


      });
    </script>
  <?php }

  ?>
</body>

</html>