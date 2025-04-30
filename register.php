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
    if (empty(trim($_POST["fname"]))) {
        $fname_err = "Please enter your first name.";
    } elseif (!preg_match('/^[a-zA-Z ]+$/', trim($_POST["fname"]))) {
        $fname_err = "First name can only contain letters and spaces.";
    } else {
        $fname = trim($_POST["fname"]);
    }

    if (empty(trim($_POST["lname"]))) {
        $lname_err = "Please enter your last name.";
    } elseif (!preg_match('/^[a-zA-Z ]+$/', trim($_POST["lname"]))) {
        $lname_err = "Last name can only contain letters and spaces.";
    } else {
        $lname = trim($_POST["lname"]);
    }

    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email address.";
    } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "Please enter a valid email address.";
    } else {
        $sql = "SELECT id FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = trim($_POST["email"]);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $email_err = "This email is already registered.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";     
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";     
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

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
$conn->close();


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f7f7f7;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            box-sizing: border-box;
        }
        .container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h1.form-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            color: #333;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .input-group input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
            background-color: #f9f9f9;
        }
        .input-group input:focus {
            border-color: #4CAF50;
            background-color: #fff;
        }
        .input-group label {
            position: absolute;
            top: -10px;
            left: 15px;
            font-size: 12px;
            color: #666;
            background-color: #fff;
            padding: 0 5px;
        }
        .input-group i {
            position: absolute;
            top: 12px;
            left: 15px;
            color: #888;
        }
        .error {
            color: #d9534f;
            font-size: 13px;
            margin-top: 5px;
        }
        .btn {
            width: 100%;
            background: #4CAF50;
            color: #fff;
            padding: 14px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .links {
            text-align: center;
            margin-top: 20px;
        }
        .links p {
            font-size: 14px;
        }
        .links a {
            color: #4CAF50;
            text-decoration: none;
        }
        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Create an Account</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                 
                <input type="text" name="fname" id="fname" value="<?php echo htmlspecialchars($fname); ?>" placeholder="First Name" required>
                <label for="fname">First Name</label>
                <span class="error"><?php echo $fname_err; ?></span>
            </div>
            <div class="input-group">
            
                <input type="text" name="lname" id="lname" value="<?php echo htmlspecialchars($lname); ?>" placeholder="Last Name" required>
                <label for="lname">Last Name</label>
                <span class="error"><?php echo $lname_err; ?></span>
            </div>
            <div class="input-group">
            
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Email" required>
                <label for="email">Email</label>
                <span class="error"><?php echo $email_err; ?></span>
            </div>
            <div class="input-group">
             
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                <span class="error"><?php echo $password_err; ?></span>
            </div>
            <div class="input-group">
                
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                <label for="confirm_password">Confirm Password</label>
                <span class="error"><?php echo $confirm_password_err; ?></span>
            </div>
            <input type="submit" class="btn" value="Register">
        </form>
        <div class="links">
            <p>Already have an account?</p>
            <a href="login.php"><button>Login Here</button></a>
        </div>
    </div>
</body>
</html>
