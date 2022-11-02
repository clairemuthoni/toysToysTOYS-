<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycart.css">
    <link href='https://css.gg/remove.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css">
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
    <div class="container">
        <p>
        <h1 class="class-text">Shopping Cart</h1>
        </p>
    </div>

    <div class="cart">
        <div class="products">
            <div class="product">
                           <?php if (empty($products)): ?>
              
                <?php else: ?>
                <?php foreach ($_SESSION['cart'] as $key => $value): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        
                        <br>
                        
                    </td>
                    <td class="price">Ksh <?=$Products['product_price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['product_id']?>" value="<?=$Products[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">Kshs <?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
                <?php $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
    
    }
?> 
            </tbody>
       
        
        </div>
        
    </form>
</div>
                </div>
            </div>
        </div>
        <div class="cart-total">
            <p>
                <span>Cart Summary</span>

            </p>
            <p>
               <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">Kshs <?=$subtotal?></span>
            </p>

            <div>
                <a class="button-1" href="secheckot.php">Proceed to checkout</a>
            </div>
            <div>
                <br>
                <a class="button-1" href="product_list.php">Continue Shopping</a>
            </div>
        </div>
    </div>

    <!-- Add your page specific code here -->



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