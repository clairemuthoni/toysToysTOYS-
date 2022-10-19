<?php
session_start();
require("..\..\middlewares\connection.php");
require("..\..\middlewares\user_guard.php");

$user_id = $_SESSION['user_id'];
$card_number = $_POST['cardNo'];
$security_number = $_POST['cvv'];
$expiry_date = $_POST['expiry'];

$query = "SELECT * FROM `card_details` WHERE `user_id` = $user_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
$count = mysqli_num_rows($result);

if (!empty($row[0])) {
    $sql = "UPDATE card_details
     SET `card_number` = '$card_number', `security_number`= '$security_number', `expiry_date`= '$expiry_date'
      WHERE user_id = $user_id;";
    $query = mysqli_query($conn, $sql);
} else {
    $sql = "INSERT INTO `card_details` (`user_id`, `card_number`, `security_number`, `expiry_date`)
    VALUES ('$user_id', '$card_number', '$security_number', '$expiry_date')";
    $query = mysqli_query($conn, $sql);
    echo $query;
}

header('Location: buyeraccount.php');
exit;
