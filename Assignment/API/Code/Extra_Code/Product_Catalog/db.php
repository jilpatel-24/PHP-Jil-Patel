<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "catalog_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!--

CREATE DATABASE catalog_db;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  category VARCHAR(50),
  price DECIMAL(10,2),
  image VARCHAR(255),
  description TEXT
);

-- Example data
INSERT INTO products (name, category, price, image, description) VALUES
('Smartphone A', 'Electronics', 12999, 'uploads/smartphone.jpg', 'A feature-packed smartphone.'),
('Laptop Pro', 'Electronics', 59999, 'uploads/laptop.jpg', 'High-performance laptop.'),
('Running Shoes', 'Footwear', 2999, 'uploads/shoes.jpg', 'Lightweight running shoes.');

-->