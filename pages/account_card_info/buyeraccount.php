<?php 
session_start();
require("..\..\middlewares\connection.php");
require("..\..\middlewares\user_guard.php");

$card_number = "";
$security_number = "";
$cvv = "";

$query = "SELECT * FROM `card_details` WHERE `user_id` = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if (!empty($row[0])) {
    $card_number = $row['card_number'];
    $security_number = $row['security_number'];
    $expiry_date = $row['expiry_date'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Toys</title>
</head>

<body>
    <!-- The Header for the Webpage -->
    <header>
        <a href="..\homepage\home.php" class="logo-text">TOYS</a>
        <div class="nav-search-bar">
            <input class="nav-search-text-field" type="text" placeholder="What are you looking for?" name="user_search"
                id="search">
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
            <a href=""><img class="nav-link cart" src="..\..\assets\icons\cart.png" alt="cart"></a>
        </div>
    </header>
    <main>
        
    <form action="process-card-info.php" method="post">
    <img class="dp" src="../../assets/images/dp.png" alt="">
    <div class="spacer"></div>
        <div class="mainn">

            <h3 class="info">Personal info</h3>
            <input type="text" class="inputinfo textfield" name="uname" id="uname" placeholder="Username"> <img
                class="edit" src="../../assets/images/edit.jpg" alt="Edit"><br>
            <h3 class="info">Add credit or debit card</h3>
            <input class="textfield" type="text" name="cardNo" id="card no" placeholder="Card Number"><br><br>
            <input class="textfield" type="text" name="expiry" id="expiry" placeholder="Expiration Date"> <input
                type="text" class="inputinfo textfield" name="cvv" id="cvv" placeholder="CVV"><br><br>
            <!-- <input class="textfield" type="text" name="fname" id="fname" placeholder="First Name"> -->
            <!-- <input type="text" class="inputinfo textfield" name="lname" id="lname" placeholder="Last Name"> -->
            <h3 class="info">Billing address</h3>
            <textarea class="inputinfo" name="address" id="address"
                placeholder="John Memia, 672537, Nairobi 00600, Ke"></textarea>
            <a href="">Edit</a><br>

        </div>
        <div class="buyerbuttons">
            <!-- <a href=""><button class="buyerbutton1">Personal Info</button></a> -->
            <!-- <a href=""><button class="buyerbutton2">Sign in and Security</button></a> -->
            <!-- <a href=""><button class="buyerbutton3">Payment Info</button></a> -->
        </div>
        <div class="secure">
            <p>Secure and Private</p><img class="lockimage" src="../../assets/images/lock.png" alt="lock">
            <!-- <a href=""><button class="confirmbutton">CONFIRM</button></a> -->
            <input class="button-1" type="submit" value="CONFIRM">
        </div>

    </form>

    </main>




    <!-- The Footer for the Webpage -->
    <!-- TIP: You can move it lower by changing the top value in the css. (Footer section) -->
    <footer>
        <div class="footer-list-1">
            <a href="..\homepage\home.php" class="logo-text">TOYS</a>
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