<?php
session_start();
require("..\..\middlewares\connection.php");

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$email=$_POST["email"];
	$password=$_POST["pass"];


	$sql="SELECT * FROM users WHERE email='".$email."' AND password='".$password."'";
    //$sql="select * from sellers where email='".$email."' AND password='".$password."' ";

	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

	if ($count == 1) {
        $_SESSION["user_id"]=$row["user_id"];
        $_SESSION["role_id"]=$row["role_id"];
        $_SESSION["first_name"]=$row["first_name"];
        $_SESSION["last_name"]=$row["last_name"];
        $_SESSION["email"]=$row["email"];

        header('Location: ..\homepage\home.php');
        exit;
    }
}

?>