<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "product_api";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}
?>
<!--
CREATE DATABASE product_api;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  description TEXT
);

-->