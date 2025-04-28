<?php
// Include Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Connect to database
include 'includes/connect.php';

// Get values from form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Generate random 6-digit verification code
$verification_code = rand(100000, 999999);

// Insert into database
$stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password, verification_code) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $fname, $lname, $email, $password, $verification_code); // Bind all parameters

if ($stmt->execute()) {
    // Send email with PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';    // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ouldhenniabaghdad@gmail.com';   // Your Gmail
        $mail->Password   = 'vtgsuvdnrehhxgwf';      // Your App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('ouldhenniabaghdad@gmail.com', 'website');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your verification code';
        $mail->Body    = "Hello,<br><br>Your verification code is: <b>" . $verification_code . "</b><br><br>Thank you!";

        $mail->send();
        echo "Registration successful! A verification code has been sent to your email.";
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
