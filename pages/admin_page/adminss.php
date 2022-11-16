<?php
session_start();

require("..\..\middlewares\connection.php");

$sql = "SELECT IFNULL(SUM(`orderdetails`.`order_quantity`), 0) AS daily_orders, 
IFNULL(SUM(`orderdetails`.`order_quantity`)*`products`.`product_price`, 0) AS daily_revenue 
FROM ((`products` 
       INNER JOIN `orderdetails` ON `products`.`product_id` = `orderdetails`.`product_id`)
       INNER JOIN `orders` ON `orderdetails`.`order_id` = `orders`.`order_id` AND `orders`.`order_status`='Pending');";
$result = mysqli_query($conn, $sql);
$summary = mysqli_fetch_assoc($result);

$daily_orders = 2;
$daily_revenue = 6000;

foreach ($summary as $key => $value) {
  if (isset($value['daily_orders'])){

    $daily_orders += intval($value['daily_orders']);
    $daily_revenue += intval($value['daily_revenue']);
  }
  // $daily_orders += intval($value['daily_orders']);
  // $daily_revenue += intval($value['daily_revenue']);
  # code...
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Toys- Admin Page</title>
  <link rel="stylesheet" href="adminss.css">
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
                          if(isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
                            echo "Hi, ".$_SESSION['first_name'];
                         }
                         else {
                          echo "Login";
                         }
                        ?>
                      </p>
                    </div>
                  </a>
            <a href="..\cart\cart.php"><img class="nav-link cart" src="..\..\assets\icons\cart.png" alt="cart"></a>
            </div>
        </header>


  <div id="body">
    <h1> Welcome, Admin</h1>
    <div id="panel">
      <ul>
        <li>Orders</li>
        <li>Products</li>
        <li>Users</li>
      </ul>
    </div>
      <span id="spans1">Daily Orders: <?php echo $daily_orders ?> </span>
      <span id="spans2">Daily Visitors 163</span>
      <span id="spans3">Daily Revenue Ksh <?php echo $daily_revenue ?></span>

    <h1 id="report"> Orders Report</h1>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>

  <canvas id="myChart" style="width:90%;max-width:1000px">

    <script>
      var xValues = ['7th November', '8th November', '9th November', '10th November', '11th November', '12th November', '13th November', '14th November', 'Yesterday', 'Today'];

      new Chart("myChart", {
        type: "line",
        display: false,
        data: {
          labels: xValues,
          datasets: [{
            data: [1, 10, 11, 15, 17, 22, 10, 14, 23, 9],
            label: "Orders",
            fill: true,
            backgroundColor: "#DF2935"
          }, {
            data: [2, 28, 17, 17, 19, 54, 12, 23, 34, 20],
            label: "Visitors",
            fill: true,
            backgroundColor: "pink"

          }]
        },
        options: {
          legend: {
            display: true,
            labels: { usePointStyle: true },
            position: "bottom"
          }
        }
      });
    </script>
  </canvas>


  <table id="table1">
    <tr>
      <td><img src="..\..\assets\images\hummer.png" width="100" length="100"> </td>
      <td>HUMMER EV Toy Car <br> <span id="name">John Memia</span></td>
      <td>Ksh 2500 <br> Quantity ordered : 20 </td>
      <td><button class="editors">Remove Order</button> <br> <button class="editors">Edit order</button> </td>
    </tr>
  </table>

  <h1 id="user_header"> User Reports </h1>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>

  <canvas id="mychart" style="width:100%;max-width:1000px">

    <script>
      var xValues = [1, 2, 3];

      new Chart("mychart", {
        type: "pie",
        display: false,
        data: {
          labels: xValues,
          datasets: [{
            data: [1, 1],
            label: "Admin",
            fill: true,
            backgroundColor: "purple"
          }, {
            data: [2, 2, 2, 2, 2, 2],
            label: "Other ",
            fill: true,
            backgroundColor: "#DF2935"

          }, {
            data: [3, 3, 3, 3],
            label: "Sellers",
            fill: true,
            backgroundColor: "pink"

          }]
        },
        options: {
          legend: {
            display: false,
          }
        }
      });
    </script>
  </canvas>

  <table id="table2">
    <tr>
      <td><img src="..\..\assets\images\facebook_no_profile_pic2-jpg.gif" width="100" length="100"> </td>
      <td>jmemia <br> <span id="name1">John Memia</span></td>
      <td> customer <br> +2547222293837 </td>
      <td><button class="editors">Remove User</button> <br> <button class="editors">Edit User details</button> </td>
    </tr>
  </table>


  <h1 id="products_header"> Product Reports </h1>

<script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"> </script>

<div  id="container" style="width:100%; height:100%">

  <script>
    /*
    var data1 = {
  header: ["Category", "Sold","Inventory"],
  rows: [
    ["Infants", 1500,200],
    ["Girls", 2000, 30],
    ["Boys", 5000, 10],
    ["Adult", 30, 20]
]}

    new Chart("mychart", {
      type: "bar",
      display: false,
      data: {
        labels: xValues,
        datasets: [{
          data: data1,
          label: "Infants",
          fill: true,
          backgroundColor: "purple"
        }, {
          data: [2, 2, 2, 2, 2, 2, 2],
          label: "Other ",
          fill: true,
          backgroundColor: "#DF2935"

        }, {
          data: [3, 3, 3, 3],
          label: "Sellers",
          fill: true,
          backgroundColor: "pink"

        }]
      },
      options: {
        legend: {
          display: false,
        }
      }
    });
    */
  </script>
</canvas>

<table id="table2">
  <tr>
    <!--
    <td><img src="..\..\assets\images\facebook_no_profile_pic2-jpg.gif" width="100" length="100"> </td>
    <td>jmemia <br> <span id="name1">John Memia</span></td>
    <td> customer <br> +2547222293837 </td>
    <td><button class="editors">Remove User</button> <br> <button class="editors">Edit User details</button> </td>
 <-->
  </tr>
</table>
















  <footer>
    <div class="footer-list-1">
      <a href="..\homepage\home.html" class="logo-text">TOYS</a>
      <div class="footer-social-media-links">
        <a href="https://www.facebook.com/"><img class="icon-facebook" src="..\..\assets\icons\facebook.png"
            alt="facebook"></a>
        <a href="https://www.instagram.com/"><img class="icon-instagram" src="..\..\assets\icons\instagram.png"
            alt="instagram"></a>
        <a href="https://www.twitter.com/"><img class="icon-twitter" src="..\..\assets\icons\twitter.png"
            alt="twitter"></a>
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