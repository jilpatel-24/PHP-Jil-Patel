<?php
session_start();
include 'newvalidation.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    echo "Welcome back, user ID: " . $_SESSION['user_id'];
} elseif (isset($_COOKIE['remember_me'])) {
    // If "Remember Me" cookie is set, log the user in automatically
    $user_id = $_COOKIE['remember_me'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        echo "Welcome back, user ID: " . $_SESSION['user_id'];
    }
} else {
    echo "Please log in.";
}
?>
