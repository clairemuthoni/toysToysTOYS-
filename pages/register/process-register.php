<?php

    // print_r($_POST);
    require("..\..\middlewares\connection.php");
    // echo $_POST['last_name'];
    // echo $_GET['email'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

   $sql = "INSERT INTO `users` (`user_id`, `role_id`, `first_name`, `last_name`, `email`, `address`, `password`)
    VALUES (NULL, '1', '$first_name', '$last_name', '$email', '', '$password')";

   if (mysqli_query($conn, $sql)){
       echo "User registered successfully";
       header('Location: ..\homepage\home.php');
       exit;
   }
   else{
       echo "Error".mysqli_error($conn);
       header('Location: ..\homepage\home.php');
       exit;
   }
?> 