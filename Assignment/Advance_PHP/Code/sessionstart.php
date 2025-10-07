<?php
session_start(); // Start the session
date_default_timezone_set('asia/calcutta');


$_SESSION['user_id'] = 12345; // Store user data
$_SESSION['username'] = 'Jil Patel';
$_SESSION['last_login'] = time(); // Store current timestamp


echo "Session started and user data stored successfully!<br>"; // Display a confirmation message
echo "User ID: " . $_SESSION['user_id'] . "<br>";
echo "Username: " . $_SESSION['username'] . "<br>";

//retrive session is second file
?>
