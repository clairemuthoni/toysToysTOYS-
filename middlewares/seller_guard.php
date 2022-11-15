<?php  

$seller_id = 2;

if(isset($_SESSION['seller_id']) && !empty($_SESSION['seller_id'])) {
    $seller_id = $_SESSION['seller_id'];
 } else {
    header("Location: ..\login\login.php");
    exit();
}

?>