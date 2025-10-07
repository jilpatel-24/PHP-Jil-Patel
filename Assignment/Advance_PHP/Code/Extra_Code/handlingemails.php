<?php

/**
 * Sends a welcome email to a newly registered user.
 *
 * @param string $recipientEmail The email address of the recipient.
 * @param string $userName The name of the user.
 * @return bool True if the email was sent successfully, false otherwise.
 */
function sendWelcomeEmail(string $recipientEmail, string $userName): bool
{
    // 1. Email Format Validation
    if (!filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
        error_log("Invalid email format for: " . $recipientEmail);
        return false; // Email format is invalid
    }

    // 2. Email Content Construction
    $subject = "Welcome to Our Service, " . htmlspecialchars($userName) . "!";
    $message = "<html><body>";
    $message .= "<h1>Hello, " . htmlspecialchars($userName) . "!</h1>";
    $message .= "<p>Welcome aboard! We are thrilled to have you join our community.</p>";
    $message .= "<p>We hope you enjoy your experience with us. If you have any questions, feel free to reach out to our support team.</p>";
    $message .= "<p>Best regards,<br>The YourService Team</p>";
    $message .= "</body></html>";

    // 3. Email Headers
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: YourService <noreply@yourservice.com>\r\n";
    $headers .= "Reply-To: support@yourservice.com\r\n";

    // 4. Sending the Email
    // In a real-world scenario, you would use a more robust mailer like PHPMailer or Swift Mailer.
    // For simplicity, we're using PHP's built-in mail() function here.
    // Ensure your server's mail configuration is set up correctly.
    if (mail($recipientEmail, $subject, $message, $headers)) {
        return true; // Email sent successfully
    } else {
        error_log("Failed to send welcome email to: " . $recipientEmail);
        return false; // Email sending failed
    }
}

// --- Example Usage ---

// Simulate a user registration
$userEmail = "testuser@example.com";
$userName = "Alice";

if (sendWelcomeEmail($userEmail, $userName)) {
    echo "Welcome email sent successfully to: " . htmlspecialchars($userEmail) . "\n";
} else {
    echo "Failed to send welcome email to: " . htmlspecialchars($userEmail) . "\n";
}

// Example with an invalid email
$invalidEmail = "invalid-email-format";
$anotherUser = "Bob";

if (sendWelcomeEmail($invalidEmail, $anotherUser)) {
    echo "Welcome email sent successfully to: " . htmlspecialchars($invalidEmail) . "\n";
} else {
    echo "Failed to send welcome email to: " . htmlspecialchars($invalidEmail) . "\n";
}

?>
