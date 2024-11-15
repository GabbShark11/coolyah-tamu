<?php
$to = "gabrieltumbur95@gmail.com";
$from = isset($_REQUEST['email']) ? $_REQUEST['email'] : 'noreply@example.com';
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : 'Anonymous';
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : 'No Message';

// Prepare email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
$headers .= "From: $from" . "\r\n";

// Prepare email body
$body = "Message From " . $_SERVER['SERVER_NAME'] . ":<br><br>";
$body .= '<strong>Name</strong>: ' . htmlspecialchars($name) . '<br>';
$body .= '<strong>Email</strong>: ' . htmlspecialchars($from) . '<br>';
$body .= '<strong>Message</strong>:<br>' . nl2br(htmlspecialchars($message)) . '<br>';

// Send email
$send = mail($to, $body, $headers);

if ($send) {
    echo "Email sent successfully.";
} else {
    error_log("Mail function failed. Check server configuration.");
    echo "Failed to send email.";
}
?>
