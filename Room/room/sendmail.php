<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Load Composer's autoloader
require 'vendor/autoload.php';

    // These must be at the top of your script, not inside a function
function sendRejectionMail($email){
    $mail = new PHPMailer();

    try {
        
        $mail->isSMTP();  // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;  // Enable SMTP authentication
        $mail->Username   = 'jphigomera0619@gmail.com';  // SMTP username
        $mail->Password   = 'hbofxxnqvkeyhgkf';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
        $mail->Port       = 587;  // TCP port to connect to (use 587 if you set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`)

        // Recipients
        $mail->setFrom('jphigomera0619@gmail.com', 'PCN Promopro Inc.');
        $mail->addAddress($email, '');  // Add a recipient

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'PCN Promopro Room Reservation';
        $mail->Body    = "PCN morning, Ma'am/Sir " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . ". We would like to inform you that your requested appointment has been rejected. For more information, kindly contact Mr. Deo or Mr. Mike. Thank you and have a good day.";

        // Send the email
        if (!$mail->send()) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        } else {
            echo "Message has been sent";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

function sendApproveMail($email){
    $mail = new PHPMailer();

    try {
        
        $mail->isSMTP();  // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
        $mail->SMTPAuth   = true;  // Enable SMTP authentication
        $mail->Username   = 'jphigomera0619@gmail.com';  // SMTP username
        $mail->Password   = 'hbofxxnqvkeyhgkf';  // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
        $mail->Port       = 587;  // TCP port to connect to (use 587 if you set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`)

        // Recipients
        $mail->setFrom('jphigomera0619@gmail.com', 'PCN Promopro Inc.');
        $mail->addAddress($email, '');  // Add a recipient

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'PCN Promopro Room Reservation';
        $mail->Body    = "PCN morning, Ma'am/Sir " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . ". We would like to inform you that your requested appointment has been approved. You can now use your selected room. Thank you and have a good day.";

        // Send the email
        if (!$mail->send()) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        } else {
            echo "Message has been sent";
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}