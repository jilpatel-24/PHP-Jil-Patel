<?php
  // Database connection details (replace with your actual details)
  $host = 'localhost';
  $dbname = 'cake';
  $dbuser = 'root';
  $dbpass = '';

  try 
  {
    // Establish a database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement (with placeholders)
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");

    // Bind the parameters (safely inserts the user-provided data)
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    // Execute the statement within a try-catch block
    try {
      $stmt->execute();
    } catch (PDOException $e) {
      // Handle query execution errors
      echo "Query failed: " . $e->getMessage();
      // You might also log the error, or take other appropriate actions
      die(); // Or handle the error more gracefully
    }

    // Fetch the results (check if a user was found)
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      // Login successful
      echo "Login successful!";
    } else {
      // Login failed
      echo "Invalid username or password.";
    }

  } catch (PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
    // You might also log the error, or take other appropriate actions
    die(); // Or handle the error more gracefully
  } catch (Exception $e) {
    // Catch any other unexpected exceptions
    echo "An unexpected error occurred: " . $e->getMessage();
    die();
  }
?>
