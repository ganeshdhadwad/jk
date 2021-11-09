<?php 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include files for PHPMailer and SMTP protocol  
require 'phpmailnow/src/Exception.php';
require 'phpmailnow/src/PHPMailer.php';
require 'phpmailnow/src/SMTP.php';

// Initialize PHP Mailer
$mail = new PHPMailer(true);                              // Passing 'true' enables exceptions
try {
    // Set SMTP as mailing protocol
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Mailer = "smtp";

    // Set required parameters for making an SMTP connection
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->SMTPAuth = TRUE;                               // Enable SMTP authentication
    $mail->SMTPSecure = "ssl";                            // Enable TLS encryption, 'ssl' (a predecessor to TSL) is also accepted
    $mail->Port = 465;                                    // TCP port to connect to (587 is a standard port for SMTP)
    $mail->Host = "smtp.gmail.com";                       // Specify main and backup SMTP servers
    $mail->Username = "info@jumboking.co.in";              // SMTP username
    $mail->Password = "wmrhcuboxklnmeiq";                     // SMTP password

    // Specify recipients
    $mail->setFrom('info@jumboking.co.in', 'JumboKing');      
    $mail->addAddress('dreamdesign.ajit@gmail.com', 'Ajit');
    // $mail->addAddress('ajit.singh@webinfinity.in');  
    // $mail->addReplyTo('reply-to-email@virginia.edu', 'name-is-optional');
    // $mail->addCC('cc-email@example.com');
    // $mail->addBCC('bcc-email@example.com');

    // Specify email content
    $mail->isHTML(true);                        // Set email format to HTML
    $mail->Subject = 'This is test smtp settings from jumboking';
    $mail->Body    = 'test body content Body text goes here'; 

    // Send email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>