<?php

    // print_r($_POST);
    require("..\..\middlewares\connection.php");
    // echo $_POST['last_name'];
    // echo $_GET['email'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role = $_POST['role'];
    $role_id = 0;

    if (isset($role) && $role == 'Buyer') {
        $role_id = 1;
    }
    if (isset($role) && $role == 'Seller') {
        $role_id = 5;
    }

   $sql = "INSERT INTO `users` (`user_id`, `role_id`, `first_name`, `last_name`, `email`, `address`, `password`)
    VALUES (NULL, '$role_id', '$first_name', '$last_name', '$email', '', '$password')";

    if (isset($role) && $role == 'Seller') {
        $query = "SELECT IFNULL(MAX(user_id), 0) FROM users";

        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
        $user_id = ($row[0]);

        $sql = "INSERT INTO `sellers` (`seller_id`, `user_id`, `company_name`)
         VALUES (NULL, '$user_id', '$first_name $last_name')";
    }

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