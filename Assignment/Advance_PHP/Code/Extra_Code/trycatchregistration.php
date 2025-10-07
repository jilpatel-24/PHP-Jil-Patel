<?php

// Configuration (Replace with your actual database credentials)
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "newuser";

// Function to sanitize input (Important for security!)
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve and sanitize form data
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);
    $email = sanitize_input($_POST["email"]);

    // Basic input validation (you should add more robust validation)
    if (empty($username) || empty($password) || empty($email)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        // Database connection
        try {
            $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }

            // Hash the password (VERY IMPORTANT for security!)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and bind the statement (Prevents SQL injection)
            $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $hashed_password, $email);

            // Execute the statement
            if ($stmt->execute()) {
                $success_message = "Registration successful! You can now log in.";
            } else {
                throw new Exception("Error: " . $stmt->error);
            }

            // Close the statement
            $stmt->close();

        } catch (Exception $e) {
            $error_message = "An error occurred: " . $e->getMessage();
        } finally {
            // Close the connection (Important to release resources)
            if (isset($conn)) {
                $conn->close();
            }
        }
    }
}

?>


<html>
<head>
    <title>User Registration</title>
</head>
<body>

    <h2>User Registration</h2>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <?php if (isset($success_message)): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <input type="submit" value="Register">
    </form>



<!--
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Consider hashing passwords!
    email VARCHAR(255) NOT NULL UNIQUE,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-->


</body>
</html>

