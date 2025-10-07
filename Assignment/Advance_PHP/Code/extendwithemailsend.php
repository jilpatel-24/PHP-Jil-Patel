<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
</head>
<body>

<h2>User Registration</h2>

<?php
// Define variables and set to empty values
$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";
$registrationSuccess = false;
$emailSent = false; // New variable to track if email was sent

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Function to sanitize input data
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  // Validate Name
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // Check if name contains only letters and whitespace
    if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
      $nameErr = "Only letters and whitespace allowed";
    }
  }

  // Validate Email
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // Check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // Validate Password
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // Password validation: At least 8 characters, 1 uppercase, 1 lowercase, 1 number
    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
      $passwordErr = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
    }
  }

  // If no errors, process the form
  if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
    // In a real application, you would now:
    // 1. Sanitize the data further (e.g., escape for database)
    // 2. Hash the password
    // 3. Store the user data in a database
    // 4. Redirect the user to a success page or login page

    // --- Email Sending ---
    $to = $email; // User's email address
    $subject = "Welcome to Our Website!";
    $message = "Dear " . $name . ",\n\nThank you for registering with us!\n\nWelcome aboard!\n\nBest regards,\nThe Website Team";
    $headers = "From: your_email@example.com" . "\r\n" . // Replace with your email
               "Reply-To: your_email@example.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
      $emailSent = true;
      $registrationSuccess = true;
    } else {
      // Handle email sending failure (e.g., log the error)
      $emailErr = "Failed to send confirmation email. Please contact support.";
      $registrationSuccess = false; // Keep registrationSuccess false if email fails
    }
  }
}
?>

<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Password: <input type="password" name="password">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($registrationSuccess) {
  if ($emailSent) {
    echo "<p>Registration successful! A confirmation email has been sent to your email address.</p>";
  } else {
    echo "<p>Registration was successful, but there was an issue sending the confirmation email. Please contact support.</p>";
    echo "<p>Error: " . $emailErr . "</p>"; // Display email error if any
  }
}
?>

</body>
</html>
