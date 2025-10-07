<?php

// Recipient email address
$to = "jilpatel2406@gmail.com"; // Replace with the recipient's email address

// Subject of the email
$subject = "Testing Email from PHP";

// Message body (HTML format is often preferred)
$message = "
<html>
<head>
<title>Test Email</title>
</head>
<body>
<h1>Hello!</h1>
<p>This is a testing email sent from a PHP script.</p>
<p>If you received this, the mail function is working!</p>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers[] = "MIME-Version: 1.0";
$headers[] = "Content-type: text/html; charset=iso-8859-1";

// Additional headers (sender, etc.) - optional but recommended
$headers[] = "From: Jil Patel <jilpatel2406@gmail.com>"; // Replace with sender's information
$headers[] = "Reply-To: jilpatel2406@gmail.com";
$headers[] = "X-Mailer: PHP/" . phpversion();

// Send the email
$mail_sent = mail($to, $subject, $message, implode("\r\n", $headers));

// Check if the email was sent successfully
if ($mail_sent) 
{
    echo "Email sent successfully!";
} 
else 
{
    echo "Email sending failed.  Check your PHP configuration and email settings.";
}

?>
