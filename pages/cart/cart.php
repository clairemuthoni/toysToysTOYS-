<?php
    session_start();
    require("..\..\middlewares\connection.php");
    require("..\..\middlewares\user_guard.php");

    $sql = 'SELECT `products`.`product_id`,  `products`.`category_id`,  `products`.`product_name`,  `products`.`product_description`,  `products`.`image_id`,  `products`.`product_price`,  `products`.`available_quantity`,  `products`.`created_at`,  `products`.`updated_at`,  `products`.`seller_id`, `orderdetails`.`order_quantity`, `orderdetails`.`orderdetails_id` FROM ((`orders` 
    INNER JOIN `orderdetails` ON `orders`.`order_id`=`orderdetails`.`order_id`)
   INNER JOIN `products` ON `products`.`product_id`=`orderdetails`.`product_id`) WHERE `orders`.`order_status`= "Pending" AND `orders`.`user_id`='.$user_id;
        $result = mysqli_query($conn, $sql);
         $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (isset($_GET["add"])){
        $id = $_GET["add"];
        $quantity = 0;

        $sql = "SELECT * FROM `orderdetails` WHERE `orderdetails_id`=$id";
        $result = mysqli_query($conn, $sql);
        $item = mysqli_fetch_assoc($result);
    
        $quantity = $item["order_quantity"];
        $quantity += 1;
        echo $quantity;
        
        $sql_add = "UPDATE `orderdetails` SET `order_quantity` = '$quantity' WHERE `orderdetails`.`orderdetails_id` = $id";
        mysqli_query($conn, $sql_add);
        header("Location: cart.php");
        exit();
    }

    if (isset($_GET["subtract"])){
        $id = $_GET["subtract"];
        $quantity = 0;

        $sql = "SELECT * FROM `orderdetails` WHERE `orderdetails_id`=$id";
        $result = mysqli_query($conn, $sql);
        $item = mysqli_fetch_assoc($result);
    
        $quantity = $item["order_quantity"];

        if ($quantity > 1){
            $quantity -= 1;
        }
        else{
            header("Location: cart.php");
            exit();
            return;
        }
        $sql_add = "UPDATE `orderdetails` SET `order_quantity` = '$quantity' WHERE `orderdetails`.`orderdetails_id` = $id";
        mysqli_query($conn, $sql_add);
        header("Location: cart.php");
        exit();
    }
    if (isset($_GET["remove"])){
        $id = $_GET["remove"];
        $sql_delete = "DELETE FROM `orderdetails` WHERE `orderdetails`.`orderdetails_id` = $id";
        mysqli_query($conn, $sql_delete);
        header("Location: cart.php");
        exit();
    }
?>

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
            <?php
            // $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
            foreach ($cart as $key => $value) {
                $sql = "SELECT `image_url` FROM product_images where `image_id` = ". $value['image_id'];
                $result = mysqli_query($conn, $sql);
                $images = mysqli_fetch_all($result);

                $sql = "SELECT * FROM `sellers` WHERE `seller_id`=".$value['seller_id'];
                $result = mysqli_query($conn, $sql);
                $array = mysqli_fetch_assoc($result);
                # code...
            ?>
            <div class="product">
                <img class="product-image" src="..\..\assets\product-images\<?php echo $images[0][0] ?>" alt="image">
                <div class="product-info">
                    <div>
                        <h3 class="product-name"><?php echo $value['product_name']; ?></h3>
                        <h3 class="product-supplier"><?php echo $array['company_name']; ?></h3>
                    </div>
                    <div class="product-price-quantity">

                        <h2 class="product-price">Ksh. <?php echo $value['product_price']; ?></h2>
                        
                        <p class='product-quantity-label'>Quantity</p>
                        <a class='product-add' href='cart.php?add="<?php echo $value['orderdetails_id']; ?>"'><b class="icon-font-size">+</b></a>
                        <p class='product-quantity'><?php echo $value['order_quantity']; ?></p>
                        <a class='product-subtract' href='cart.php?subtract="<?php echo $value['orderdetails_id']; ?>"'><p class="icon-font-size">-</p></a>
                        <a class="product-remove" href='cart.php?remove="<?php echo $value['orderdetails_id']; ?>"'><p>Remove</p></a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
            
        </div>
        <div class="cart-total">
            <p>
                <span>Cart Summary</span>

            </p>
            <p>
                <span>Total:</span>
                <?php
                $total = 0;
                foreach ($cart as $key => $value) {
                    # code...
                    $total += $value['product_price'] * $value['order_quantity'];

                }
                ?>
                <span>Ksh <?php echo $total; ?></span>
            </p>

            <div>
                <a class="button-1" href="..\checkout\secheckout.php">Proceed to checkout</a>
            </div>
            <div>
                <br>
                <a class="button-1" href="..\products_list\product_list.php">Continue Shopping</a>
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