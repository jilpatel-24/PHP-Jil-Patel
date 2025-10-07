<?php

// Function to validate username
function validateUsername($username) {
  // Regular expression for username validation (alphanumeric and underscore, 3-20 characters)
  $pattern = '/^[a-zA-Z0-9_]{3,20}$/';
  if (preg_match($pattern, $username)) {
    return true; // Username is valid
  } else {
    return "Username must be **3-20** characters long and contain only letters, numbers, and underscores.";
  }
}

// Function to validate password
function validatePassword($password) {
  // Regular expression for password validation (at least 8 characters, one uppercase, one lowercase, one number)
  $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
  if (preg_match($pattern, $password)) {
    return true; // Password is valid
  } else {
    return "Password must be at least **8** characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
  }
}

// Function to validate email
function validateEmail($email) {
  // Regular expression for email validation
  $pattern = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';
  if (preg_match($pattern, $email)) {
    return true; // Email is valid
  } else {
    return "Invalid email format. Please enter a valid email address.";
  }
}

// Handle form submission (if the form is submitted)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  // Validate inputs
  $username_error = validateUsername($username);
  $password_error = validatePassword($password);
  $email_error = validateEmail($email);

  // Display results
  echo "<h2>Validation Results:</h2>";
  if ($username_error === true) {
    echo "<p>Username is valid.</p>";
  } else {
    echo "<p style='color:red;'>Username Error: " . $username_error . "</p>";
  }

  if ($password_error === true) {
    echo "<p>Password is valid.</p>";
  } else {
    echo "<p style='color:red;'>Password Error: " . $password_error . "</p>";
  }

  if ($email_error === true) {
    echo "<p>Email is valid.</p>";
  } else {
    echo "<p style='color:red;'>Email Error: " . $email_error . "</p>";
  }
}

?>

<!-- HTML form -->

<html>
<head>
  <title>User Input Validation</title>
</head>
<body>
  <h2>User Input Form</h2>
  <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>
