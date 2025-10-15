<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "product_catalog";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) 
{
    die("Database connection failed: " . $conn->connect_error);
}
?>
<!--
CREATE DATABASE product_catalog;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  category VARCHAR(50),
  price DECIMAL(10,2) NOT NULL,
  description TEXT,
  image VARCHAR(255)
);

INSERT INTO products (name, category, price, description, image) VALUES
('Wireless Earbuds', 'Electronics', 1999.00, 'Bluetooth 5.3 earbuds with 30hr battery', 'earbuds.jpg'),
('Smart Watch', 'Wearables', 3499.00, 'Fitness tracking with heart rate monitor', 'smartwatch.jpg'),
('Gaming Mouse', 'Accessories', 1499.00, 'RGB mouse with 6 programmable buttons', 'mouse.jpg');

-->