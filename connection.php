<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database= "Toys";

$conn = new mysqli($server_name, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?> 