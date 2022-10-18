<?php
session_start();
require("..\..\middlewares\connection.php");
$error = '';
if (isset($_POST['buyeraccount'])) {
    if (empty($_POST['cardno']) || empty($_POST['expiry']) || empty($_POST['CVC'])) {
        $error = "Retry";
    } else {
        $user_id = 0;
        $card_number = $_POST['cardno'];
        $security_number = $_POST['CVC'];
        $expiry_date = $_POST['expiry'];
        $query = mysqli_query($conn, "INSERT INTO `card_details` (`user_id`, `card_number`, `security_number`, `expiry_date`) VALUES ('$user_id', '$card_number', '$security_number', '$expiry_date')");
        $rows = mysqli_fetch_assoc($query);
        if ($rows) {
            $_SESSION['user_id'] = $rows['user_id'];
            header("location: ..\home.html");
        } else {
            $error = "error";
            echo $error;
        }
    }
}
