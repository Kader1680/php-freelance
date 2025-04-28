<?php

include 'includes/connect.php';

// Get email and code from form
$email = $_POST['email'];
$code = $_POST['code'];

// Check if code matches
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND verification_code = ?");
$stmt->bind_param("ss", $email, $code);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Correct code -> verify user
    $update = $conn->prepare("UPDATE users SET is_verified = 1, verification_code = NULL WHERE email = ?");
    $update->bind_param("s", $email);
    $update->execute();

    echo "Your email has been verified successfully!";
} else {
    echo "Invalid verification code. Please try again.";
}

$stmt->close();
$conn->close();
?>
