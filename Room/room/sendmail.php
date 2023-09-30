<?php
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer();

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
    $mail->isSMTP();  // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;  // Enable SMTP authentication
    $mail->Username   = 'jphigomera0619@gmail.com';  // SMTP username
    $mail->Password   = 'hbofxxnqvkeyhgkf';  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
    $mail->Port       = 587;  // TCP port to connect to (use 587 if you set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`)

    // Recipients
    $mail->setFrom('jphigomera0619@gmail.com', 'Mailer');
    $mail->addAddress('jpgomera19@gmail.com', '');  // Add a recipient

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the email
    if (!$mail->send()) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    } else {
        echo "Message has been sent";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}