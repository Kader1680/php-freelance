<?php
// include 'includes/header.php';
include 'includes/connect.php';
?>

<style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        margin: 0;
    }
    .message-box {
        background: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        text-align: center;
        max-width: 400px;
        width: 100%;
    }
    .success {
        color: green;
        font-weight: bold;
        font-size: 18px;
    }
    .error {
        color: red;
        font-weight: bold;
        font-size: 18px;
    }
</style>

<main>
    <div class="message-box">
    <?php
    // Check if form data is set
    if (isset($_POST['email'], $_POST['code'])) {
        $email = trim($_POST['email']);
        $code = trim($_POST['code']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($code)) {
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND verification_code = ?");
            $stmt->bind_param("ss", $email, $code);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $update = $conn->prepare("UPDATE users SET is_verified = 1, verification_code = NULL WHERE email = ?");
                $update->bind_param("s", $email);
                if ($update->execute()) {
                    echo "<div class='success'>Your email has been verified successfully!</div>";
                } else {
                    echo "<div class='error'>Error updating verification status. Please try again later.</div>";
                }
                $update->close();
            } else {
                echo "<div class='error'>Invalid verification code. Please try again.</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='error'>Invalid input. Please check your email and code.</div>";
        }
    } else {
        echo "<div class='error'>Please fill out the form properly.</div>";
    }

    $conn->close();
    ?>
    </div>
</main>


