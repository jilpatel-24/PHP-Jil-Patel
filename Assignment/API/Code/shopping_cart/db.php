<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "shop_cart";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!--
CREATE DATABASE shop_cart;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  image VARCHAR(255)
);

INSERT INTO products (name, price, image) VALUES
('Smart Watch', 3499.00, 'smartwatch.jpg'),
('Wireless Earbuds', 1999.00, 'earbuds.jpg'),
('Gaming Mouse', 1499.00, 'mouse.jpg');

-->