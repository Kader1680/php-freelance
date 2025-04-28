<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include 'includes/connect.php';
session_start();

// إرسال كود التحقق
if (isset($_POST['sendCode'])) {
    $email = $_POST['email'];
    $verificationCode = rand(100000, 999999);
    $_SESSION['verification_code'] = $verificationCode;
    $_SESSION['user_email'] = $email;

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0; // 0 للإنتاج – 2 للتجربة
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($_ENV['MAIL_USERNAME'], 'Admin');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Code de vérification';
        $mail->Body = "Votre code de vérification est : <b>$verificationCode</b>";

        $mail->send();
        echo "Code envoyé ! Vérifiez votre e-mail.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du code : " . $mail->ErrorInfo;
    }
    exit();
}

// تسجيل مستخدم جديد
if (isset($_POST['signup'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $enteredCode = $_POST['verificationCode'];

    if ($_SESSION['verification_code'] != $enteredCode || $_SESSION['user_email'] != $email) {
        echo "Code incorrect ou email non correspondant !";
        exit();
    }

    $checkEmail = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Adresse e-mail déjà utilisée !";
    } else {
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
        if ($stmt->execute()) {
            unset($_SESSION['verification_code']);
            unset($_SESSION['user_email']);
            header("location: index.php");
            exit();
        } else {
            echo "Erreur lors de l'inscription : " . $conn->error;
        }
    }
}

// تسجيل الدخول
if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Adresse e-mail non trouvée.";
    }
}
?>

