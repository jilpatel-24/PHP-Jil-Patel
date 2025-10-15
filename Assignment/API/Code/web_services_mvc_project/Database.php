<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "mvc_api";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die(json_encode(["error" => "Database connection failed"]));
        }
    }
}
?>
<!--
CREATE DATABASE mvc_api;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255)
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  price DECIMAL(10,2),
  description TEXT
);

-->