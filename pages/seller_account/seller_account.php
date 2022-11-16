<?php

session_start();
require("..\..\middlewares\connection.php");
require("..\..\middlewares\seller_guard.php");

// $seller_id = 2;

$sql = "SELECT `products`.`product_name`, `products`.`product_price`, `products`.`image_id`, `products`.`seller_id`,
SUM(`orderdetails`.`order_quantity`) AS total_sales, 
SUM(`orderdetails`.`order_quantity`)*`products`.`product_price` AS total_amount 
FROM ((`products` 
       INNER JOIN `orderdetails` ON `products`.`seller_id`=$seller_id AND `products`.`product_id` = `orderdetails`.`product_id`)
       INNER JOIN `orders` ON `orderdetails`.`order_id` = `orders`.`order_id` AND `orders`.`order_status`!='Pending');";
$result = mysqli_query($conn, $sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

$date_today = date('Y-m-d');
$sql = "SELECT IFNULL(SUM(`orderdetails`.`order_quantity`), 0) AS daily_orders, 
IFNULL(SUM(`orderdetails`.`order_quantity`)*`products`.`product_price`, 0) AS daily_revenue 
FROM ((`products` 
       INNER JOIN `orderdetails` ON `products`.`seller_id`=$seller_id AND `products`.`product_id` = `orderdetails`.`product_id`)
       INNER JOIN `orders` ON `orderdetails`.`order_id` = `orders`.`order_id` AND `orders`.`order_status`!='Pending' AND `orders`.`updated_at` >= '$date_today');";
$result = mysqli_query($conn, $sql);
$summary = mysqli_fetch_assoc($result);

$date_2 = date_create();;
date_sub($date_2, date_interval_create_from_date_string("7 days"));
$date_this_week = $date_2->format('Y-m-d');
$sql = "SELECT IFNULL(SUM(`orderdetails`.`order_quantity`), 0) AS daily_orders, 
IFNULL(SUM(`orderdetails`.`order_quantity`)*`products`.`product_price`, 0) AS weekly_revenue 
FROM ((`products` 
       INNER JOIN `orderdetails` ON `products`.`seller_id`=$seller_id AND `products`.`product_id` = `orderdetails`.`product_id`)
       INNER JOIN `orders` ON `orderdetails`.`order_id` = `orders`.`order_id` AND `orders`.`order_status`!='Pending' AND `orders`.`updated_at` >= '$date_this_week');";
$result = mysqli_query($conn, $sql);
$summary1 = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Toys- Seller Account Page </title>
        <link rel="stylesheet" href="seller_account.css">
    </head>

    <body>
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
        <div class="content">
        <h1 id ="Welcome">Welcome, <?php echo $_SESSION['company_name']; ?></h1>
        <?php

        ?>
        <span id="orders"> Daily orders: <?php echo $summary['daily_orders']; ?> </span>

        <span id="revenue"> Daily Revenue: Ksh. <?php echo $summary['daily_orders']; ?></span>

        <span id="weekly_revenue"> Weekly Revenue: Ksh. <?php echo $summary1['weekly_revenue']; ?></span><br>

        <a id="add_prod" class="button-1" href="..\add_product\add_product.php">Add New Product</a>
                <br>
                <br>
                <a id="manage_acc" class="button-1" href="seller_info.html">Manage my Account</a>

        <div class="Timeframe">
        <span id="t">Timeframe : </span>

        <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Lifetime</button>
         <div id="myDropdown" class="dropdown-content">
          <a href="#">This week </a>
          <a href="#">This Month </a>
          <a href="#">This year </a>
          </div>
          </div>

          </div>

          <table>
            <?php
            foreach ($products as $key => $value) {
                # code...
                if (is_null($value['product_name'])) {
                    return;
                }
                $sql = "SELECT `image_url` FROM product_images where `image_id` = ". $value['image_id'];
                $result = mysqli_query($conn, $sql);
                $images = mysqli_fetch_all($result);

                $sql = "SELECT * FROM `sellers` WHERE `seller_id`=".$value['seller_id'];
                $result = mysqli_query($conn, $sql);
                $array = mysqli_fetch_assoc($result);
            ?>
            <tr>
              <td><img src="..\..\assets\product-images\<?php echo $images[0][0] ?>" width="150" length="150"></td>
              <td><p><?php echo $value['product_name']; ?></p>
                <!-- <br> -->
                <p id="company"> <?php echo $_SESSION['company_name']; ?></p>
            </td>
            <td><p>Total Revenue: Ksh. <?php echo $value['total_amount']; ?></p>
                <p>Quantity sold : <?php echo $value['total_sales']; ?></p>
            </td>
            </tr>
            <?php
            }
            ?>
          </table>

          </div>

          <footer>
            <div class="footer-list-1">
                <a href="" class="logo-text">TOYS</a>
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

    </body>
</html>