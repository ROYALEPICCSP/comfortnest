<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php'; // Ensure PHPMailer is loaded correctly

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Define the recipient email address
$receiving_email_address = 'comfortnest79@gmail.com';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'comfortnest79@gmail.com';
    $mail->Password = 'epwe txko heit ezzb'; // Use App Password for Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Set sender and recipient
    $mail->setFrom('comfortnest79@gmail.com', 'Comfort Nest Newsletter'); // Sender's email and name
    $mail->addAddress('comfortnest79@gmail.com'); // Recipient email

    // Email content
    $mail->isHTML(true);
    $mail->Subject = "New Newsletter Subscription: " . $_POST['email'];
    $mail->Body = "You have a new subscriber: " . htmlspecialchars($_POST['email']);

    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
