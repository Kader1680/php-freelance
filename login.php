<?php
session_start();
require_once './includes/connect.php';

$email = $password = "";
$email_err = $password_err = $login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email.";
    } else {
        $email = trim($_POST["email"]);
    }
 
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT id, fname, lname, email, password FROM users WHERE email = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $email;
            
            if ($stmt->execute()) {
                $stmt->store_result();
                
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $fname, $lname, $email, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["fname"] = $fname;
                            $_SESSION["lname"] = $lname;
                            header("location: index.php");
                        } else {
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid email or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | University Portal</title>
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

        /* Header/Navbar Styles */
        header {
            background-color: var(--primary-color);
            color: var(--light-color);
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 50px;
            width: auto;
        }

        .university-name {
            font-size: 14px;
            font-family: 'Georgia', serif;
            margin-left: 15px;
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

        /* Login Form Styles */
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
            margin-bottom: 25px;
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
            padding: 15px 15px 15px 45px;
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
            top: 15px;
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
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #003366;
            transform: translateY(-2px);
        }

        .or {
            text-align: center;
            margin: 20px 0;
            position: relative;
            color: #999;
        }

        .or::before,
        .or::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background-color: #ddd;
        }

        .or::before {
            left: 0;
        }

        .or::after {
            right: 0;
        }

        .links {
            text-align: center;
            margin-top: 20px;
        }

        .links p {
            margin-bottom: 15px;
            color: #666;
        }

        #signUpButton {
            background-color: transparent;
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #signUpButton:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        #signUpButton a {
            color: inherit;
            text-decoration: none;
        }

        .error {
            border: 1px solid #f75757;
            background-color: #ff000040;
            padding: 15px;
            margin-bottom: 20px;
            color: #8e0303;
            border-radius: 5px;
            text-align: center;
        }

        .is-invalid {
            border-color: #f75757 !important;
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
    

    <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <?php 
        if (!empty($login_err)) {
            echo '<div class="error">' . $login_err . '</div>';
        }        
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
                <i class="fas fa-envelope"></i>         
                <input type="email" name="email" class="<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" required>
                <label for="email">Email</label>
                <?php if (!empty($email_err)) echo '<span class="error-text">'.$email_err.'</span>'; ?>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" required>
                <label for="password">Password</label>
                <?php if (!empty($password_err)) echo '<span class="error-text">'.$password_err.'</span>'; ?>
            </div>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <p class="or">OR</p>
        <div class="links">
            <p>Don't Have an Account Yet?</p>
            <button id="signUpButton"><a href="register.php">Sign Up</a></button>
        </div>
    </div>
</body>
</html>