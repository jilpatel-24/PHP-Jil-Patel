<?php
session_start(); // Start or resume the session

if (isset($_SESSION['user_id']) && isset($_SESSION['username']))  // Check if the session variables are set
{
    $userId = $_SESSION['user_id'];  // Retrieve and display the data
    $username = $_SESSION['username'];
    $lastLogin = $_SESSION['last_login'];

    echo "Welcome back, $username!<br>";
    echo "Your User ID is: $userId<br>";
    echo "Last Login: " . date("Y-m-d H:i:s", $lastLogin) . "<br>"; //timestamp
} 
else 
{
    echo "No session data found. Please start a new session.<br>";
}
?>
