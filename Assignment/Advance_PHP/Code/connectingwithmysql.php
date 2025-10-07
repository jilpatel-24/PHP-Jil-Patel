<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "testdb";  // Change to your database name

$conn = new mysqli($servername, $username, $password, $database); // Create connection

if ($conn->connect_error)  // Check connection
{   
    die("Database connection failed: " . $conn->connect_error);  // If connection fails, show error message and stop execution
} 
else 
{
    echo "Database connected successfully!";
}

$conn->close();  // Close the connection (optional)
?>
