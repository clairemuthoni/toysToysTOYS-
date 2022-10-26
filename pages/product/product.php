<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <title>Toys</title>
        <link
  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
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

    <?php
    require ('..\..\middlewares\connection.php');
$sql=" SELECT * FROM products WHERE product_id =3";
$result=mysqli_query($conn,$sql)

?>
<?php 
            while($row = mysqli_fetch_assoc($result)){

             ?>


             <div class="image">
    <!-- Slider main container -->
<div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide"><img src="lego_images/lego1.jfif"></div>
      <div class="swiper-slide"><img src="lego_images/lego2.jfif"></div>
      <div class="swiper-slide"><img src="lego_images/lego3.jfif"></div>
      <div class="swiper-slide"><img src="lego_images/lego4.jfif"></div>
      <div class="swiper-slide"><img src="lego_images/lego5.jfif"></div>
      <div class="swiper-slide"><img src="lego_images/lego6.jfif"></div>


      ...
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>
  
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    </div>
    </div>
     <p class="name"> <?php echo $row['product_name'] ?></p>
     <p class="retailers"> Spark retailers</p>
     <p class="price">Kshs <?php echo $row['product_price'] ?></p>
     <a class="button-1" href="">ADD TO CART</a>
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
                delay:1400,
                disableOnInteractiion: false,
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
