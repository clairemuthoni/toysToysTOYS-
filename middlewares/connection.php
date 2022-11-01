<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "toys";

    $date = date('m/d/Y h:i:s a', time());

    $conn = mysqli_connect($serverName, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Connection Failed: ".$conn->connect_error);
        return;
    }
    else {
    }