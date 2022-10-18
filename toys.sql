CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `role_name` tinytext NOT NULL
);

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `role_id` int(10) NOT NULL,
  `first_name` tinytext NOT NULL,
  `last_name` tinytext NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

CREATE TABLE IF NOT EXISTS `card_details` (
  `user_id` int(10) PRIMARY KEY,
  `card_number` int(16) NOT NULL,
  `security_number` int(10) NOT NULL,
  `expiry_date` VARCHAR(30) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE IF NOT EXISTS `sellers` (
    `seller_id` int(10) PRIMARY KEY AUTO_INCREMENT,
    `user_id` int(10) NOT NULL,
    `company_name` tinytext NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE IF NOT EXISTS `categories` (
    `category_id` int(10) PRIMARY KEY AUTO_INCREMENT,
    `category_name` tinytext NOT NULL,
    `category_description` tinytext NOT NULL
);

CREATE TABLE IF NOT EXISTS `product_images` (
    `image_id` int(10),
    `image_url` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `products` (
    `product_id` int(10) PRIMARY KEY AUTO_INCREMENT,
    `category_id` int(10) DEFAULT NULL,
    `product_name` tinytext NOT NULL,
    `product_description` TEXT NOT NULL,
    `image_id` int(10),
    `product_price` int(10) NOT NULL,
    `available_quantity` int(10) NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime DEFAULT NULL,
    `seller_id` int(10),
    FOREIGN KEY (seller_id) REFERENCES sellers(seller_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `payment_status` enum('Not Paid ','Paid')  NOT NULL,
  `deliver_status` enum('Not Left','Shipped','Received') NOT NULL,
  `order_price` int(10) NOT NULL,
  `no_of_product` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_deleted` int(1) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `orderdetails_id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product price` int(10)  NOT NULL,
  `order_quantity` int(10) NOT NULL,
  `order_total` int(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  FOREIGN KEY (order_id) REFERENCES orders(order_id),
  FOREIGN KEY (product_id) REFERENCES products(product_id)
);
