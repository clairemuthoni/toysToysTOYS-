<!DOCTYPE html>
<html>
    <head>
        <title>Toys- Seller Account Page </title>
        <link rel="stylesheet" href="seller_account.css">
    </head>

    <body>
      <header>
        <a href="..\homepage\home.html" class="logo-text">TOYS</a>
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
        <div class="content">
        <h1 id ="Welcome">Welcome, Seller</h1>
        <span id="orders"> Daily orders 27 </span>
        
        <span id="revenue"> Daily Revenue ksh 17345</span>

        <span id="weekly_revenue"> Weekly Revenue  ksh 73246</span><br>

        <div class="Timeframe">
        <span id="t">Timeframe : </span>
      
        <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Today</button>
         <div id="myDropdown" class="dropdown-content">
          <a href="#">This week </a>
          <a href="#">This Month </a>
          <a href="#">This year </a>
          </div>
          </div>

          </div>

          <table>
            <tr>
              <td><img src="..\..\assets\images\hummer.png" width="150" length="150"></td>
              <td>HUMMER EV Toy Car<br> <p id="company"> Company</p></td>
              <td>Ksh 2500 <br> Quantity sold : 20 </td>
              <td><a href="add_product.html"><button id="add_prod">Add New Product</button></a><br><a href="seller_info.html"><button id="manage_acc">Manage my Account</button></a></td>
            </tr>
          </table>
          </div>

          <footer>
            <div class="footer-list-1">
                <a href="..\homepage\home.html" class="logo-text">TOYS</a>
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