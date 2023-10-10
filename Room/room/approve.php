<?php
include 'connect.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['approveBtn'])) {
    $date = $_POST['approveDate'];
    $status = "approved";
    $bg = "#3c763d";

    $checkQuery = "SELECT * FROM events WHERE evt_start = '$date' AND status = 'pending'";
    $checkResult = $connect->query($checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        $query = "UPDATE events SET status = '$status', evt_bg = '$bg' WHERE evt_start = '$date' AND status = 'pending'";
        $stmt = $connect->query($query);
        
        if ($stmt) {

            $totalcounts = mysqli_num_rows($checkResult);
            

            $emails = array();
            $fullnames = array();

            while($row = mysqli_fetch_assoc($checkResult)){
                $fullname = $row['fullName'];
                $emails = $row['email'];
            }

            foreach ($emails as $email) {
            $mail = new PHPMailer();

            try {
              // Server settings
              $mail->isSMTP();  // Send using SMTP
              $mail->Host       = 'smtp.gmail.com';  // Set the SMTP server to send through
              $mail->SMTPAuth   = true;  // Enable SMTP authentication
              $mail->Username   = 'jphigomera0619@gmail.com';  // SMTP username
              $mail->Password   = 'hbofxxnqvkeyhgkf';  // SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable STARTTLS encryption
              $mail->Port       = 587;  // TCP port to connect to (use 587 if you set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`)
      
              // Recipients
              $mail->setFrom('PCNPromopro@gmail.com', 'PCN Promopro Inc.');
              $mail->addAddress($email, '');  // Add a recipient
      
              // Content
              $mail->isHTML(true);  // Set email format to HTML
              $mail->Subject = 'PCN Room Reservation';
              $mail->Body    = '<center>
                                <div class="container" style="margin: 10rem;">
                                  <div class="logo">
                                      <img src="/images/pcn.png" alt="" width="15%">
                                  </div>
                                  <div class="div-message" style="margin:0 20rem;">
                                      <h3 style="font-family: Arial, Helvetica, sans-serif; text-align: justify;">PCN Morning, ' . $fullname . ', </h3>
                                      <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">Your room reservation has been approved. You can now use the room. Thank you and have a good day.</p>
                                        <br>
                                    </div>
                                    <div class="footer-message" style="margin: 0 16rem;">
                                        <p style="font-family: Arial, Helvetica, sans-serif; text-align: justify; text-indent: 4rem;">Best Regards, MIS Department</p>
                                    </div>
                                </div>
                              </center>';
      
              // Send the email
              if (!$mail->send()) {
                echo "Message could not be sent.";
              } else {
            $_SESSION['successMessage'] = "Successfully Approved " . $totalcounts . " appointment/s";
            header("Location: index.php");
              }
            } 
        
            catch (Exception $e) {
                echo "Message could not be sent.";
                echo "Email Address: " . $email;
              }
            }
        } else {
            $_SESSION['error'] = "Nothing to approve on selected date.";
            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] = "Nothing to approve on selected date.";
        header("Location: index.php");
    }
}
