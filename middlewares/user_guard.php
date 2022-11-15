<?php  

$user_id = 1;

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: ..\login\login.php");
    exit();
}


?>