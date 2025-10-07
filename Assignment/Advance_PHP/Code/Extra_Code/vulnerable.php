<?php
// Database connection details (replace with your actual details)
$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "cake";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get user input (DO NOT DO THIS IN REAL CODE!)
$user_input = $_GET["username"];

// Build the SQL query (VULNERABLE)
$sql = "SELECT * FROM users WHERE username = '$user_input'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>
