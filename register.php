<?php
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once './includes/connect.php';

$fname = $lname = $email = $password = $confirm_password = "";
$fname_err = $lname_err = $email_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation code remains the same...
    // [Previous validation code here...]

    if (empty($fname_err) && empty($lname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        $stmt = $conn->prepare("INSERT INTO users (fname, lname, email, password, verification_code) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $lname, $email, $password, $verification_code); 
        $verification_code = rand(100000, 999999);
        
        if ($stmt->execute()) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = $_ENV['MAIL_HOST'];
                $mail->SMTPAuth   = true;
                $mail->Username   = $_ENV['MAIL_USERNAME'];
                $mail->Password   = $_ENV['MAIL_PASSWORD'];
                $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
                $mail->Port       = $_ENV['MAIL_PORT'];

                $mail->setFrom($_ENV['MAIL_FROM'], $_ENV['MAIL_FROM_NAME']);
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Your verification code';
                $mail->Body    = "Hello,<br><br>Your verification code is: <b>" . $verification_code . "</b><br><br>Thank you!";

                $mail->send();
                header("location: verify.html");
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | University Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        :root {
            --primary-color: #002147;
            --secondary-color: #b58e53;
            --light-color: #ffffff;
            --dark-color: #333333;
            --gray-color: #f5f5f5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--gray-color);
            color: var(--dark-color);
            line-height: 1.6;
        }

  

        .auth-buttons {
            display: flex;
            gap: 10px;
        }

        .auth-btn {
            background-color: var(--secondary-color);
            color: var(--light-color);
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .auth-btn:hover {
            background-color: #9a7a45;
            transform: translateY(-2px);
        }

        /* Registration Form Styles */
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 40px;
            background-color: var(--light-color);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            position: relative;
        }

        .form-title::after {
            content: "";
            display: block;
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
            margin: 10px auto 0;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .input-group i {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: var(--secondary-color);
        }

        .input-group input {
            width: 100%;
            padding: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: var(--secondary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(181, 142, 83, 0.2);
        }

        .input-group label {
            position: absolute;
            left: 45px;
            top: 04px;
            color: #999;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .input-group input:focus + label,
        .input-group input:valid + label {
            top: -10px;
            left: 35px;
            font-size: 12px;
            background-color: var(--light-color);
            padding: 0 5px;
            color: var(--secondary-color);
        }

        .btn {
            width: 100%;
            padding: 5px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #003366;
            transform: translateY(-2px);
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links p {
            margin-bottom: 15px;
            color: #666;
        }

        .links button {
            background-color: transparent;
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
            padding: 7px 15px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .links button:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .links a {
            color: inherit;
            text-decoration: none;
        }

        .error {
            color: #d9534f;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .is-invalid {
            border-color: #d9534f !important;
        }

        .password-strength {
            margin-top: 5px;
            font-size: 14px;
        }

        .strength-weak {
            color: #d9534f;
        }

        .strength-medium {
            color: #f0ad4e;
        }

        .strength-strong {
            color: #5cb85c;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                margin: 30px 20px;
                padding: 30px;
            }
            
            header {
                flex-direction: column;
                text-align: center;
                padding: 15px;
            }
            
            .logo-container {
                margin-bottom: 15px;
            }
            
            .auth-buttons {
                margin-top: 15px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }
            
            .form-title {
                font-size: 24px;
            }
            
            .input-group input {
                padding: 12px 12px 12px 40px;
            }
        }
    </style>
</head>
<body>
     

    <div class="container">
        <h1 class="form-title">Create an Account</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($fname); ?>" 
                       class="<?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" required>
                <label for="fname">First Name</label>
                <span class="error"><?php echo $fname_err; ?></span>
            </div>
            
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" name="lname" id="lname" value="<?php echo htmlspecialchars($lname); ?>" 
                       class="<?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" required>
                <label for="lname">Last Name</label>
                <span class="error"><?php echo $lname_err; ?></span>
            </div>
            
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" 
                       class="<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" required>
                <label for="email">Email</label>
                <span class="error"><?php echo $email_err; ?></span>
            </div>
            
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" 
                       class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" required>
                <label for="password">Password</label>
                <span class="error"><?php echo $password_err; ?></span>
                <div id="password-strength" class="password-strength"></div>
            </div>
            
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="confirm_password" id="confirm_password" 
                       class="<?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" required>
                <label for="confirm_password">Confirm Password</label>
                <span class="error"><?php echo $confirm_password_err; ?></span>
            </div>
            
            <input type="submit" class="btn" value="Register">
        </form>
        <div class="links">
            <p>Already have an account?</p>
            <a href="login.php"><button>Sign In Here</button></a>
        </div>
    </div>

    <script>
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthText = document.getElementById('password-strength');
            
            if (password.length === 0) {
                strengthText.textContent = '';
                return;
            }
            
            let strength = 0;
            
            // Length check
            if (password.length >= 8) strength++;
            if (password.length >= 12) strength++;
            
            // Complexity checks
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            // Update display
            if (strength <= 2) {
                strengthText.textContent = 'Weak';
                strengthText.className = 'password-strength strength-weak';
            } else if (strength <= 4) {
                strengthText.textContent = 'Medium';
                strengthText.className = 'password-strength strength-medium';
            } else {
                strengthText.textContent = 'Strong';
                strengthText.className = 'password-strength strength-strong';
            }
        });
    </script>
</body>
</html>