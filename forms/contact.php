<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php'; // Correct path to your autoload.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // Create a new PHPMailer instance

try {
    // Server settings
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'comfortnest79@gmail.com'; // Your SMTP username (your Gmail email)
    $mail->Password = 'epwe txko heit ezzb'; // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587; // TCP port to connect to

    // Recipients
    $senderEmail = $_POST['email']; // Sender's email from the form
    $senderName = $_POST['name']; // Sender's name from the form
    
    $mail->setFrom('comfortnest79@gmail.com', 'Comfort Nest Form'); // Your company's name here
    $mail->addAddress('comfortnest79@gmail.com'); // Receiving address

    // Optional: Add a reply-to header
    $mail->addReplyTo($senderEmail, $senderName); // This is optional, but useful for replying directly to the sender

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $_POST['subject']; // Subject from form input
    $mail->Body = nl2br($_POST['message']); // Message from form input, converting line breaks to HTML <br>

    // Send the email
    if ($mail->send()) {
        echo 'OK';
    } else {
        echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
