<?php
session_start();

require("..\..\middlewares\connection.php");
require("..\..\middlewares\seller_guard.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Toys - Add Product </title>
        <link rel="stylesheet" href="add_product.css">
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
        <div class="form">
        <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
<p class="add">ADD PRODUCT</p>
        <div class="pname">
            <label for="product_name"> Name:</label>
            <input class="textfield tf-align" type="type" name="pname">
        </div>
        <div class="image">
            <label for="product_image"> Image: </label>
            <input class="textfield tf-align" type="file" name="product_image_1">
            <input class="textfield tf-align-2" type="file" name="product_image_2">
        </div>
        <div class="description">
            <label for="product_description "> Description: </label>
            <input class="textfield tf-align" type="type" name="Description">
        </div>
        <div class="quantity">
            <label for="available_quantity"> Quantity: </label>
            <input class="textfield tf-align" type="type" name="Quantity">
        </div>
        <div class="category">
            <label for="Category"> Category: </label>
            <!-- <input class="textfield" type="type" name="Category"> -->
            <select class="textfield tf-align" type="text" name="Category" id="category" placeholder="Category">
            <?php

                $sql_cat = "SELECT * FROM `categories`";
                $result_cat = mysqli_query($conn, $sql_cat);
                $array_cat = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);
                
                foreach($array_cat as $key => $value){
                    echo "<option value=".$value["category_id"].">".$value["category_name"]."</option>";
                }
                
            ?>
            </select>
        </div>
        <div class="price">
            <label for="product_price"> Price (Ksh.): </label>
            <input class="textfield tf-align" type="type" name="Price">
        </div>
        <input class="button-1" type="submit" name="submit2" value="ADD PRODUCT">
        </form>
    </div>
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


    </body>
</html>