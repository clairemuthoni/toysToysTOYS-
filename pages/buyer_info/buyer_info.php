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

    <span id="trial">Welcome, 
        <?php
        if(isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
            echo $_SESSION['first_name'];
         }
         else {
          echo "Customer";
         }
        ?>
    </span>

    <form action="buyer_info2.php" method="POST">

    <?php
            require("..\..\middlewares\connection.php");
            require("..\..\middlewares\user_guard.php");

            $sql = "SELECT * FROM users WHERE user_id='$user_id'";//user_id='{$_SESSION["user_id"]}'
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>

        <div id="content">
            <h1>Personal info</h1>
            <label for="uname">Username</label><br><br>
            <input type="text" id="uname" name="uname" placeholder="Name" value="<?php echo $row['first_name']; ?>" required>
            <!--
                <input type="text" placeholder="Username" name="uname">-->
            <!-- Get a photo of an pen -->
            <!--<img src=""    ><br>-->

            <h1>Contact info</h1>
            <label for="emails">Email Address</label><br><br>
            <input type="text" id="emails" name="emails" placeholder="Email Address" value="<?php echo $row['email']; ?>" required><br><br><br>
            <!--
                  <input type="email" name="emails">-->
            <!-- Get a photo of an pen -->
            <!--<img src=""    ><br>-->
            <!-- <label for="pnumber">Phone number</label><br><br> -->
            <!-- <input type="text" id="pnumber" name="pnumber" placeholder="Phone Number" value=" " disabled required><br><br><br> -->
            <!--
                <input type="number" name="pnumber">-->
            <!-- Get a photo of an pen -->
            <!--<img src=""    ><br>-->

            <label for="add_name">Address</label><br><br>
            <input type="text" id="address" name="address" placeholder="Address" value="<?php echo $row['address']; ?>" required>

            <!--
                <input type="text" name="add_name">-->
            <!-- Get a photo of an pen -->
            <!--<img src=""    ><br>-->

            <div id="buttons">
                <input class="button-1" id="save" type="submit" value="Save info"><br>
                <a href="payment_info.html"><button class="button-1" id="Payment">Payment Info</button></a>

                <?php
                }
            }

            ?>
            </div>

        </div>
    </form>

    <?php
if (isset($_POST['submit'])){
$uname=$_POST['uname'];
$emails=$_POST['emails'];
$address=$_POST['address'];

$sql = "UPDATE Users SET first_name='$uname', email= '$email', address='$address' WHERE role_id='1'";//user_id='{$_SESSION["user_id"]}'

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
}  

?> 



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
