<?php

function sanitizeAndValidateEmail($email) 
{
    // Sanitize the email input
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    // Validate the sanitized email
    if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) 
	{
        return $sanitizedEmail; // Return the valid sanitized email
    } 
	else 
	{
        return false; // Return false if the email is invalid
    }
}

// Example Usage
$userInputEmail = "jilpatel2406@gmail.com<script>alert('XSS');</script>";
$validatedEmail = sanitizeAndValidateEmail($userInputEmail);

if ($validatedEmail) 
{
    echo "Valid Email: " . $validatedEmail;
} 
else 
{
    echo "Invalid Email.";
}

?>
