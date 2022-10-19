<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css">

  <title>Toys</title>
</head>

<body>
  <!-- The Header for the Webpage -->
  <header>
    <a href="..\homepage\home.php" class="logo-text">TOYS</a>
    <div class="nav-search-bar">
      <input class="nav-search-text-field" type="text" placeholder="What are you looking for?" name="user_search"
        id="search">
      <a href=""><img class="nav-search-button" src="..\..\assets\icons\search-filled.png">


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


  <br>
  <br>

  <div class="back-image slideshow-container">

    <div class="mySlides fade">
      <!-- <div class="numbertext"></div> -->
      <img src="..\..\assets\images\Image 1.png" style="width:100%">
      <p class="foreground-text">Toys for your loved ones</p>
      <a class="button-1" href="..\products_list\product_list.html">SHOP NOW</a>
    </div>

    <div class="mySlides fade">
      <!-- <div class="numbertext"></div> -->
      <img src="..\..\assets\images\Image 2.png" style="width:100%">
      <p class="foreground-text">Get toys for play and for learning </p>
      <a class="button-1" href="..\products_list\product_list.html">SHOP NOW</a>

    </div>

  </div>
  <br>

  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
  </div>

  <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) { slideIndex = 1 }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      setTimeout(showSlides, 5000);
    }
  </script>
  <!-- <div>
    <img class="back-image" src="..\..\assets\images\Image 1.png" width="100%" height="35%">
    <p class="foreground-text">Toys for your loved ones</p>
    <a class="button-1" href="..\products_list\product_list.html">SHOP NOW</a>


  </div> -->

  <br>

  <h2>Newest Arrival</h2>
  <br>

  <div class="horizontal-list">   
    <a href="..\product\product.html">
       <div class="product-card">
           <img src="..\..\assets\images\images\roman.jpg" alt="image">
           <p class="product-name">Roman Reigns Action Figure</p>
           <p class="supplier-name">WWE Retailers</p>
           <p class="product-price">Ksh 1750</p>
       </div>
   </a>
       <a href="..\product\product.html">
       <div class="product-card">
        <img src="..\..\assets\images\images\gun.jpg" alt="image">
        <p class="product-name">Burst Air Gun</p>
           <p class="supplier-name">CSI Retailers</p>
           <p class="product-price">Ksh 1200</p>
       </div>
   </a>
   <a href="..\product\product.html">
       <div class="product-card">
        <img src="..\..\assets\images\images\truck.jpeg" alt="image">
        <p class="product-name">Off-Road Truck</p>
           <p class="supplier-name">Spark Retailers</p>
           <p class="product-price">Ksh 1150</p>
       </div>
   </a>
   <a href="..\product\product.html">
       <div class="product-card">
        <img src="..\..\assets\images\images\barbiedoll.jpg" alt="image">
        <p class="product-name">Barbie Doll</p>
           <p class="supplier-name">CoolKids Retailers</p>
           <p class="product-price">Ksh 950</p>
       </div>
   </a>
   <a href="..\product\product.html">
       <div class="product-card">
        <img src="..\..\assets\images\images\hotwheels.jpeg" alt="image">
        <p class="product-name">Hot Wheels</p>
           <p class="supplier-name">Spark Retailers</p>
           <p class="product-price">Ksh 850</p>
       </div>
   </a>


   <a href="..\product\product.html">
     <div class="product-card">
      <img src="..\..\assets\images\images\batman.jpeg" alt="image">
      <p class="product-name">Batman Action Figure</p>
         <p class="supplier-name">CoolKids Retailers</p>
         <p class="product-price">Ksh 1850</p>
     </div>
 </a>
 <a href="..\product\product.html">
     <div class="product-card">
      <img src="..\..\assets\images\images\firetruck.jpeg" alt="image">
      <p class="product-name">Fire Truck</p>
         <p class="supplier-name">Toyworld Retailers</p>
         <p class="product-price">Ksh 3050</p>
     </div>
 </a>
 <a href="..\product\product.html">
     <div class="product-card">
           <img src="..\..\assets\images\images\gijoe.jpg" alt="image">
         <p class="product-name">GI JOE</p>
         <p class="supplier-name">CoolKids Retailers</p>
         <p class="product-price">Ksh 1750</p>
     </div>
 </a>
 <a href="..\product\product.html">
     <div class="product-card">
      <img src="..\..\assets\images\images\tennis.jpg" alt="image">
      <p class="product-name">Tennis Ball</p>
         <p class="supplier-name">Spark Retailers</p>
         <p class="product-price">Ksh 650</p>
     </div>
 </a>
 <a href="..\product\product.html">
     <div class="product-card">
      <img src="..\..\assets\images\images\yoyo.jpg" alt="image">
      <p class="product-name">Magic Yoyo</p>
         <p class="supplier-name">Toyworld Retailers</p>
         <p class="product-price">Ksh 900</p>
     </div>
 </a>
 
</div>

  <!-- <div class="row">
    <div class="column">
      <h2>Legos</h2>
      <img src="..\..\assets\images\car.jfif" alt="Car Legos">
      <li>Lego Car</li>
      <li>JUMIA</li>
      <li>Ksh1000</li>

      <br>
      <button>BUY NOW!</button>
    </div>

    <div class="column">
      <h2>Drones</h2>
      <img src="..\..\assets\images\drone.jfif" alt="Drones">
      <li>DJI DRONE</li>
      <li>Alibaba</li>
      <li>Ksh20000</li>
      <br>
      <button>BUY NOW!</button>
    </div>

    <div class="column">
      <h2>Dolls</h2>
      <img src="..\..\assets\images\doll.jfif" alt="Girl Doll">
      <li>Barbie Doll</li>
      <li>Ebay</li>
      <li>Ksh1500</li>

      <br>
      <button>BUY NOW!</button>
    </div>
  </div>

  <br> -->

  <h2>Most Purchased</h2>

  <div class="horizontal-list">   
    <a href="..\product\product.html">
       <div class="product-card">
           <img src="..\..\assets\images\images\roman.jpg" alt="image">
           <p class="product-name">Roman Reigns Action Figure</p>
           <p class="supplier-name">WWE Retailers</p>
           <p class="product-price">Ksh 1750</p>
       </div>
   </a>
       <a href="..\product\product.html">
       <div class="product-card">
        <img src="..\..\assets\images\images\gun.jpg" alt="image">
        <p class="product-name">Burst Air Gun</p>
           <p class="supplier-name">CSI Retailers</p>
           <p class="product-price">Ksh 1200</p>
       </div>
   </a>
   <a href="..\product\product.html">
       <div class="product-card">
        <img src="..\..\assets\images\images\truck.jpeg" alt="image">
        <p class="product-name">Off-Road Truck</p>
           <p class="supplier-name">Spark Retailers</p>
           <p class="product-price">Ksh 1150</p>
       </div>
   </a>
   <a href="..\product\product.html">
       <div class="product-card">
        <img src="..\..\assets\images\images\barbiedoll.jpg" alt="image">
        <p class="product-name">Barbie Doll</p>
           <p class="supplier-name">CoolKids Retailers</p>
           <p class="product-price">Ksh 950</p>
       </div>
   </a>
   <a href="..\product\product.html">
       <div class="product-card">
        <img src="..\..\assets\images\images\hotwheels.jpeg" alt="image">
        <p class="product-name">Hot Wheels</p>
           <p class="supplier-name">Spark Retailers</p>
           <p class="product-price">Ksh 850</p>
       </div>
   </a>


   <a href="..\product\product.html">
     <div class="product-card">
      <img src="..\..\assets\images\images\batman.jpeg" alt="image">
      <p class="product-name">Batman Action Figure</p>
         <p class="supplier-name">CoolKids Retailers</p>
         <p class="product-price">Ksh 1850</p>
     </div>
 </a>
 <a href="..\product\product.html">
     <div class="product-card">
      <img src="..\..\assets\images\images\firetruck.jpeg" alt="image">
      <p class="product-name">Fire Truck</p>
         <p class="supplier-name">Toyworld Retailers</p>
         <p class="product-price">Ksh 3050</p>
     </div>
 </a>
 <a href="..\product\product.html">
     <div class="product-card">
           <img src="..\..\assets\images\images\gijoe.jpg" alt="image">
         <p class="product-name">GI JOE</p>
         <p class="supplier-name">CoolKids Retailers</p>
         <p class="product-price">Ksh 1750</p>
     </div>
 </a>
 <a href="..\product\product.html">
     <div class="product-card">
      <img src="..\..\assets\images\images\tennis.jpg" alt="image">
      <p class="product-name">Tennis Ball</p>
         <p class="supplier-name">Spark Retailers</p>
         <p class="product-price">Ksh 650</p>
     </div>
 </a>
 <a href="..\product\product.html">
     <div class="product-card">
      <img src="..\..\assets\images\images\yoyo.jpg" alt="image">
      <p class="product-name">Magic Yoyo</p>
         <p class="supplier-name">Toyworld Retailers</p>
         <p class="product-price">Ksh 900</p>
     </div>
 </a>
 
</div>

  <!-- <br>
  <div class="row">
    <div class="column">
      <h2>Remote Control Toys</h2>
      <img src="..\..\assets\images\remotetoy.jfif" alt="Remote Control toy">
      <li>Remote Control Toy</li>
      <li>JUMIA</li>
      <li>Ksh3000</li>

      <br>
      <button>BUY NOW!</button>
    </div>

    <div class="column">
      <h2>Doll House</h2>
      <img src="..\..\assets\images\dollhouse.jfif" alt="A girls dream doll house">
      <li>Barbie Doll House</li>
      <li>JUMIA</li>
      <li>Ksh2500</li>

      <br>
      <button>BUY NOW!</button>
    </div>

    <div class="column">
      <h2>Puzzle</h2>
      <img src="..\..\assets\images\puzzle.jfif" alt="Puzzles">
      <li>Kid's Puzzle</li>
      <li>JUMIA</li>
      <li>Ksh200</li>

      <br>
      <button>BUY NOW!</button>
    </div>
  </div>
  <br>
 -->


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