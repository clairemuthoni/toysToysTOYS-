<?php
require("..\..\middlewares\connection.php");

$pname = $_POST['pname'];
$Description = $_POST['Description'];
$Price = $_POST['Price'];
$Quantity = $_POST['Quantity'];
$Category = $_POST['Category'];

//------------------------Get the Maximum/Highest Image ID, then add plus 1 to make a new entry------------------------

$query = "SELECT IFNULL(MAX(image_id), 0) FROM product_images";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$image_id = ($row[0] + 1);


//------------------------Image 1 - Uploading it to the server------------------------

$errors = array();
$file_name = $_FILES['product_image_1']['name'];
$file_size = $_FILES['product_image_1']['size'];
$file_tmp = $_FILES['product_image_1']['tmp_name'];
$file_type = $_FILES['product_image_1']['type'];
$item_image_name = $file_name;


// Check if file already exists
if (file_exists("/product-images/" . $item_image_name)) {
    $errors[] = "Sorry, file already exists.";
}

if (empty($errors) == true) {
    move_uploaded_file($file_tmp, "..\..\assets\product-images\\". $item_image_name);
    echo "<br>Success";
} else {
    print_r($errors);
}
$query = "INSERT INTO `product_images` (`image_id`, `image_url`) VALUES ($image_id, '$item_image_name')";

mysqli_query($conn, $query);

//------------------------Image 2 - Uploading it to the server------------------------

$file_name = $_FILES['product_image_2']['name'];
$file_size = $_FILES['product_image_2']['size'];
$file_tmp = $_FILES['product_image_2']['tmp_name'];
$file_type = $_FILES['product_image_2']['type'];
$item_image_name = $file_name;


// Check if file already exists
if (file_exists("..\..\assets\product-images\\" . $item_image_name)) {
    $errors[] = "Sorry, file already exists.";
}

if (empty($errors) == true) {
    move_uploaded_file($file_tmp, "..\..\assets\product-images\\" . $item_image_name);
    echo "<br>Success";
} else {
    print_r($errors);
}
$query = "INSERT INTO `product_images` (`image_id`, `image_url`) VALUES ($image_id, '$item_image_name')";

mysqli_query($conn, $query);

//------------------------Upload the product to the database------------------------

$sql = "INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_description`, `image_id`, `product_price`, `available_quantity`, `created_at`, `updated_at`, `seller_id`)
	 VALUES (NULL, NULL, '$pname', '$Description', '$image_id', '$Price', '$Quantity', '2022-10-17 20:17:32.000000', NULL, NULL)";

if ($conn->query($sql) == TRUE) {
    echo "You have successfully added a product";
    header('Location: add_product.php');
    exit;
} else {
    echo "error:" . $sql . "<br>" . $conn->error;
}
