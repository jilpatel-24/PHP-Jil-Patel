<?php

// Create an associative array for user details
$userDetails = array
(
    "name" => "JIL PATEL",
    "email" => "jp@gmail.com",
    "age" => 22
);


echo "<pre>";    // Use <pre> to format the output nicely
print_r($userDetails);
echo "</pre>";

// Display the user details individually (more readable)
echo "Name: " . $userDetails["name"] . "<br>";
echo "Email: " . $userDetails["email"] . "<br>";
echo "Age: " . $userDetails["age"] . "<br>";

?>
