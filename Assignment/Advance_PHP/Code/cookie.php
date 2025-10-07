<?php
// Setting a cookie
setcookie("user_preference", "dark_mode", time() + 30, "/"); // Expires in 30 second

// Retrieving a cookie
if (isset($_COOKIE['user_preference'])) 
{
    $userPreference = $_COOKIE['user_preference'];
    echo "Your preference is: $userPreference<br>";
} 
else 
{
    echo "No preference set.<br>";
}
?>
