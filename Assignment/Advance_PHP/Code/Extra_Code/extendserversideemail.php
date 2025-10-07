<?php

// Function to validate username
function validateUsername($username) {
    $pattern = '/^[a-zA-Z0-9_]{3,20}$/';
    if (preg_match($pattern, $username)) {
        return true; // Username is valid
    } else {
        return "Username must be **3-20** characters long and contain only letters, numbers, and underscores.";
    }
}

// Function to validate password
function validatePassword($password) {
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
    if (preg_match($pattern, $password)) {
        return true; // Password is valid
    } else {
        return "Password must be at least **8** characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
    }
}

// Function to validate email
function validateEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; // Email is valid
    } else {
        return "Invalid email format. Please enter a valid email address.";
    }
}

// Function to send confirmation email
function sendConfirmationEmail($email) {
    $subject = "Registration Confirmation";
    $message = "Thank you for registering! Please confirm your email address.";
    $headers = "From: no-reply@example.com";

    // Use mail() function to send email
    if (mail($email, $subject, $message, $headers)) {
        return true; // Email sent successfully
    } else {
        return "Failed to send confirmation email.";
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        // Send confirmation email
        $email_sent = sendConfirmationEmail($email);
        if ($email_sent === true) {
            echo "<p>Confirmation email sent successfully!</p>";
        } else {
            echo "<p style='color:red;'>Email Error: " . $email_sent . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Email Error: " . $email_error . "</p>";
    }
}
?>

<!-- HTML form -->

<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>User Registration Form</h2>
    <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
