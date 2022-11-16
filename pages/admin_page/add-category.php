<?php

require("..\..\middlewares\connection.php");

    $category=$_POST['new-category'];

    $sql = "INSERT INTO `tbl_categories`(`category_id`, `category_name`, `category_description`)
     VALUES (NULL, '$category', NULL);";

    if (mysqli_query($conn, $sql)){
        echo "Category Created successfully";
        header('Location: adminns_add.php');
    exit;
    }
    else{
        echo "Error".mysqli_error($conn);
    }

?>
