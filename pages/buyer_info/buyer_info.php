<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="buyer_info.css">
    <title>Toys - Buyer details</title>
</head>

<body>
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
                    session_start();
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

    <img id="profile" src="..\..\assets\images\facebook_no_profile_pic2-jpg.gif" width="300" height="450">

    <span id="trial">Welcome, customer ! </span>

    <form action="buyer_info.html" method="GET">

        <div id="content">
            <h1>Personal info</h1>
            <label for="uname">Username</label><br>
            <span>jmemia</span><br>
            <!--
                <input type="text" placeholder="Username" name="uname">-->
            <!-- Get a photo of an pen -->
            <!--<img src=""    ><br>-->

            <h1>Contact info</h1>
            <label for="emails">Email Adress</label><br>
            <span>U*****e@gmail.com</span><br>
            <!--
                  <input type="email" name="emails">-->
            <!-- Get a photo of an pen -->
            <!--<img src=""    ><br>-->
            <label for="pnumber">Phone number</label><br>
            <span>+254XXXXXXXX01</span><br>
            <!--
                <input type="number" name="pnumber">-->
            <!-- Get a photo of an pen -->
            <!--<img src=""    ><br>-->

            <label for="add_name">Owner name, address</label><br>
            <span>John Memia</span><br>
            <span>672537<br>Nairobi 00600 <br>KE</span><br>

            <!--
                <input type="text" name="add_name">-->
            <!-- Get a photo of an pen -->
            <!--<img src=""    ><br>-->

            <div id="buttons">
                <input class="button-1" id="save" type="submit" value="Save info"><br>
                <a href="payment_info.html"><button class="button-1" id="Payment">Payment Info</button></a>
            </div>

        </div>
    </form>


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