<?php

/**
 * Sanitizes and validates an email address, throwing an exception on failure.
 *
 * @param string $email The email address to sanitize and validate.
 * @return string The sanitized email address.
 * @throws InvalidArgumentException If the email address is invalid.
 */
function sanitizeAndValidateEmail(string $email): string {
    // 1. Sanitize the input:
    //    - FILTER_SANITIZE_EMAIL removes characters that are not valid in an email address.
    $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);

    // 2. Validate the sanitized input:
    //    - FILTER_VALIDATE_EMAIL checks if the email address has a valid format.
    if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL) === false) {
        // 3. Throw an exception if validation fails:
        throw new InvalidArgumentException('Invalid email address format provided.');
    }

    // Return the sanitized and validated email address
    return $sanitizedEmail;
}

// --- Example Usage ---

// Example 1: Valid email
try 
{
    $validEmail = ' test.user@example.com '; // Email with leading/trailing spaces
    $sanitizedValidEmail = sanitizeAndValidateEmail($validEmail);
    echo "Successfully validated and sanitized email: " . htmlspecialchars($sanitizedValidEmail) . "<br>";
} 
catch (InvalidArgumentException $e) 
{
    echo "Error: " . $e->getMessage() . "<br>";
}

// Example 2: Invalid email (missing @ symbol)
try 
{
    $invalidEmail = 'invalid-email.com';
    $sanitizedInvalidEmail = sanitizeAndValidateEmail($invalidEmail);
    echo "Successfully validated and sanitized email: " . htmlspecialchars($sanitizedInvalidEmail) . "<br>";
} 
catch (InvalidArgumentException $e) 
{
    echo "Error: " . $e->getMessage() . "<br>";
}

// Example 3: Invalid email (invalid characters)
try 
{
    $malformedEmail = 'user@domain.c<om>';
    $sanitizedMalformedEmail = sanitizeAndValidateEmail($malformedEmail);
    echo "Successfully validated and sanitized email: " . htmlspecialchars($sanitizedMalformedEmail) . "<br>";
} 
catch (InvalidArgumentException $e) 
{
    echo "Error: " . $e->getMessage() . "<br>";
}

?>
