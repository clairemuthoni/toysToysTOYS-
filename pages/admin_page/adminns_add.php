<!DOCTYPE html>
<html>

<head>
  <title>Toys- Admin Dashboard Page</title>
  <link rel="stylesheet" href="admins_add.css">
  <script defer src="adminscript.js"></script>
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

  <table>
    <tr>
      <th id="add_cat">ADD CATEGORY</th>
      <!-- <img id="add_cat_i" src="../../assets/images/images/category_toy.jpeg" alt="add_cat"> -->
      <td>
        <div id="category_class">
        <form id="form-category" action="add-category.php" method="post">
          <input class="add-category-field input-field" type="text" name="new-category" id="new-category" placeholder="Category Name">
          <input class="button-1" type="submit" value="Add" name="create">
        </form>
      </td>
    </tr>

    <tr>
      
      <th id="add_prod">ADD PRODUCT</th>
      <img id="add_prod_i" src="../../assets/images/images/UGC-1.webp" alt="add_prod">
      <td>
      <div id="products">
        <form id="form-product" action="../add_product/process_add_product.php" method="post" enctype="multipart/form-data">

        <input class="input-field" type="text" name="item-name" id="item-name" placeholder="Item Name">
        <input class="input-field" type="text" name="category" id="category" placeholder="category"><br>
        <input class="input-field" type="text" name="item-price" id="item-price" placeholder="Price (Ksh.)">
        <input class="input-field" type="text" name="item-quantity" id="item-quantity" placeholder="Quantity"><br>
        <input class="input-field" type="text" name="item-description" id="item-description" placeholder="Description">
        <input class="input-field" type="text" name="item-image-name" id="item-image-name" placeholder="Image Name">
        <input class="add-image-field " type="file" name="item-image" id="item-image" ><br>
        <input class="button-1" type="submit" value="ADD ITEM" name="add-item">
        </form>
      </td>
      </div> 
    </tr>
    
    <tr>
      <th id="add_user">ADD USER</th>
      <img id="add_user_i" src="../../assets/images/images/user_sell_toys.webp" alt="add_prod">
      <td>
       <div id="users">
        <form id="form-users" action="/process-register.php" method="post">
          <input class="new-user-fname-field input-field" type="text" name="first_name" id="first_name" placeholder="First Name">
          <input class="new-user-lname-field input-field" type="text" name="last_name" id="last_name" placeholder="Last Name"><br>
          <input class="new-user-email-field input-field" type="text" name="user_email" id="email" placeholder="Email Address">
          <input class="new-user-password-field input-field" type="password" name="user_password" id="password" placeholder="Password"><br>
          <input class="adm-buyer-radio-btn" type="radio" id="buyer" name="role" value="Buyer">
          <label class="adm-buyer-radio-label" id="buyer-btn" for="buyer">Buyer</label>
          <input class="adm-seller-radio-btn" type="radio" id="seller" name="role" value="Seller">
          <label class="adm-seller-radio-label" id="seller-btn" for="seller">Seller</label><br>
          <input class="button-1" type="submit" value="REGISTER" name="register">
        </form>
      </td>
      </div>
    </tr>
  </table>
  
  <a class="button-1 dashboard-button" href="adminss.php">Go to dashboard</a>

</body>















































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