<?php
require('connect.php');

	
	$pname= $_POST['pname'];
	$Description= $_POST['Description'];
	$Price= $_POST['Price'];
	$Quantity=$_POST['Quantity'];
	$Category=$_POST['Category'];
	

$query = "SELECT IFNULL(MAX(image_id), 0) FROM product_images";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $image_id = ($row[0] + 1);


	$errors= array();
        $file_name = $_FILES['product_image_1']['name'];
        $file_size =$_FILES['product_image_1']['size'];
        $file_tmp =$_FILES['product_image_1']['tmp_name'];
        $file_type=$_FILES['product_image_1']['type'];
        //$file_ext=strtolower(end(explode('.',$_FILES['product_image_1']['name'])));
        //$extensions= array("jpeg","jpg","png");
        $item_image_name = $file_name;
        
        /*if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }*/

        // Check if file already exists
        if (file_exists("/product-images/".$item_image_name)) {
            $errors[]="Sorry, file already exists.";
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_name,"/product-images/".$item_image_name);
           echo "<br>Success";
        }else{
           print_r($errors);
        }
$query = "INSERT INTO `product_images` (`image_id`, `image_url`) VALUES ($image_id, '$item_image_name')";

mysqli_query($conn, $query);

$file_name = $_FILES['product_image_2']['name'];
        $file_size =$_FILES['product_image_2']['size'];
        $file_tmp =$_FILES['product_image_2']['tmp_name'];
        $file_type=$_FILES['product_image_2']['type'];
        //$file_ext=strtolower(end(explode('.',$_FILES['product_image_1']['name'])));
        //$extensions= array("jpeg","jpg","png");
        $item_image_name = $file_name;
        
        /*if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }*/

        // Check if file already exists
        if (file_exists("/product-images/".$item_image_name)) {
            $errors[]="Sorry, file already exists.";
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_name,"/product-images/".$item_image_name);
           echo "<br>Success";
        }else{
           print_r($errors);
        }
$query = "INSERT INTO `product_images` (`image_id`, `image_url`) VALUES ($image_id, '$item_image_name')";

mysqli_query($conn, $query);



	$sql="INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `product_description`, `image_id`, `product_price`, `available_quantity`, `created_at`, `updated_at`, `seller_id`)
	 VALUES (NULL, NULL, '$pname', '$Description', '$image_id', '$Price', '$Quantity', '2022-10-17 20:17:32.000000', NULL, NULL)";

if($conn->query($sql)==TRUE){
	echo "You have successfully added a product";
}else{
	echo "error:" .$sql . "<br>" . $conn->error;
}

?>