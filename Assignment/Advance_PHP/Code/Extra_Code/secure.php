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

// Get user input
$user_input = $_GET["username"];

// Prepare the SQL statement (using placeholders)
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);

// Bind the parameter
$stmt->bind_param("s", $user_input); // "s" indicates a string data type

// Execute the prepared statement
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}

$stmt->close();
$conn->close();
?>
