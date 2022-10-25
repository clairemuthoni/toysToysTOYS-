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




    <!-- Add your page specific code here -->
    <div class="categories">
        <p class="category-title">Categories</p>
        <p class="category-text">Category 1</p>
        <p class="category-text">Category 2</p>
        <p class="category-text">Category 3</p>
    </div>

    <div class="horizontal-list">

    <?php 
    require("..\..\middlewares\connection.php");
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($products as $key=> $value) {
        $sql = "SELECT `image_url` FROM product_images where `image_id` = ". $value['image_id'];
        $result = mysqli_query($conn, $sql);
        $images = mysqli_fetch_all($result);
    ?>
        <a href="..\product\product.php">
            <div class="product-card">
                <div>
                    <img class="image-1" src="..\..\assets\product-images\<?php echo $images[0][0] ?>" alt="image-1">
                    <img class="image-2" src="..\..\assets\product-images\<?php echo $images[1][0] ?>" alt="image-2">
                </div>
                <p class="product-name"><?php echo $value['product_name'] ?></p>
                <p class="supplier-name">Spark Retailers</p>
                <p class="product-price">Ksh <?php echo $value['product_price'] ?></p>
            </div>
        </a>
    <?php
    }
    ?>
    </div>

    <!-- The Footer for the Webpage -->
    <!-- TIP: You can move it lower by changing the top value in the css. (Footer section) -->
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