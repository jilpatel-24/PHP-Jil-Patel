<?php
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  // ... (rest of the code to execute the query)
?>


<?php
  // Database connection details (replace with your actual details)
  $host = 'localhost';
  $dbname = 'cake';
  $dbuser = 'root';
  $dbpass = '';

  try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Or handle the error more gracefully
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  // Prepare the SQL statement (with placeholders)
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");

  // Bind the parameters (safely inserts the user-provided data)
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password);

  // Execute the statement
  $stmt->execute();

  // Fetch the results (check if a user was found)
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // Login successful
    echo "Login successful!";
  } else {
    // Login failed
    echo "Invalid username or password.";
  }
?>
