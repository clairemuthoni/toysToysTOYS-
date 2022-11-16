<?php

require('../../middlewares/connection.php')




$sql1 ="SELECT count(orders) FROM 'toys' ";

$sql ="SELECT orders FROM 'toys' WHERE ..... ";

$sql = "SELECT count(sellers) FROM 'toys'";
$sql = "SELECT count(users) FROM 'toys'";
$sql = "SELECT * FROM 'toys'";
$result = mysqli_query($mysqli, $sql);

while($row = mysqli_fetch_array($result)){

    $data1 = $data1 . '"'.$row['data1'].'",';
    $data2 = $data2 . '"'.$row['data2'].'",'; 
}

$data1 = trim($data1,",");
$data2 = trim($data2,",");

?>