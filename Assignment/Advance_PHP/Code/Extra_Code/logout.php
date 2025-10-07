<?php
session_start();
session_destroy();
setcookie('remember_me', '', time() - 3600, "/"); // Remove the cookie
echo "You have been logged out.";
?>
