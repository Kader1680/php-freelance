<?php
session_start();
include "./translate.php";

$current_lang = isset($_GET['lang']) ? $_GET['lang'] : 'fr';
?>
<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/<?php echo basename($_SERVER['PHP_SELF'], '.php'); ?>.css">
    <style>
        :root {
            --primary-color: #002147;
            --secondary-color: #b58e53;
            --light-color: #ffffff;
            --dark-color: #333333;
            --gray-color: #f5f5f5;
            --footer-color: #002F67;
        }

        /* Header Structure */
        header {
            background-color: var(--primary-color);
            color: var(--light-color);
            padding: 0 5%;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000;
        }

        /* Logo Section */
        .logo-section {
            display: flex;
            align-items: center;
            padding: 10px 0;
            flex: 1;
            min-width: 250px;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 50px;
            width: auto;
            object-fit: contain;
        }

        .separator {
            width: 2px;
            height: 40px;
            background-color: var(--light-color);
            margin: 0 15px;
            opacity: 0.7;
        }

        .university-name {
            font-size: 14px;
            font-weight: normal;
            font-family: 'Georgia', serif;
            max-width: 200px;
            line-height: 1.3;
        }

        /* Mobile Menu Toggle */
        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 24px;
            color: var(--light-color);
            padding: 15px;
            order: 2;
        }

        /* Navigation */
        .nav-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex: 2;
            min-width: 300px;
        }

        nav {
            margin-right: 20px;
        }

        .nav-links {
            list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    align-items: center;
        }

        .nav-links li {
            margin: 0 12px;
            position: relative;
        }

        .nav-links li a {
            color: var(--light-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 12px;
    padding: 15px 0px;
            transition: all 0.3s ease;
            display: block;
            position: relative;
        }

        .nav-links li a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 15px;
            width: 100%;
            height: 2px;
            background-color: var(--secondary-color);
            transform: scaleX(0);
            transition: transform 0.3s ease-in-out;
        }

        .nav-links li a:hover::after {
            transform: scaleX(1);
        }

        .nav-links li a:hover {
            color: var(--secondary-color);
        }

        /* Language Dropdown */
        .language-dropdown {
            position: relative;
            margin: 0 20px;
        }

        .language-dropbtn {
            background-color: transparent;
            color: var(--light-color);
            padding: 8px 15px;
            font-size: 14px;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            min-width: 100px;
            justify-content: space-between;
        }

        .language-dropbtn:hover {
            background-color: rgba(255,255,255,0.1);
        }

        .language-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: var(--light-color);
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            border-radius: 4px;
            overflow: hidden;
            z-index: 1;
        }

        .language-dropdown-content a {
            color: var(--dark-color);
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .language-dropdown-content a:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        .language-dropdown.active .language-dropdown-content {
            display: block;
        }

        /* Auth Buttons */
        .auth-buttons {
            display: flex;
            gap: 10px;
            margin-left: 20px;
        }

        .auth-btn {
            background-color: var(--secondary-color);
            color: var(--light-color);
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .auth-btn:hover {
            background-color: #9a7a45;
            transform: translateY(-2px);
        }

        .auth-btn.logout {
            background-color: #6c757d;
        }

        .auth-btn.logout:hover {
            background-color: #5a6268;
        }

        /* Mobile Styles */
        @media (max-width: 992px) {
            .nav-links li {
                margin: 0 8px;
            }
            
            .language-dropdown {
                margin: 0 10px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 0 20px;
                position: relative;
            }

            .logo-section {
                order: 1;
                padding: 10px 0;
            }

            .menu-toggle {
                display: block;
                order: 2;
            }

            .nav-container {
                order: 3;
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
                display: none;
                padding: 15px 0;
            }

            nav {
                width: 100%;
                margin: 15px 0;
            }

            .nav-links {
                flex-direction: column;
            }

            .nav-links li {
                margin: 5px 0;
            }

            .nav-links li a {
                padding: 10px 0;
            }

            .nav-links li a::after {
                bottom: 5px;
            }

            .language-dropdown {
                margin: 15px 0;
                width: 100%;
            }

            .language-dropdown-content {
                position: static;
                width: 100%;
            }

            .auth-buttons {
                margin: 15px 0 20px;
                width: 100%;
                justify-content: center;
            }

            .nav-active {
                display: flex;
            }
        }

        @media (max-width: 576px) {
            .university-name {
                display: none;
            }

            .separator {
                display: none;
            }

            .logo {
                height: 40px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-section">
            <div class="logo-container">
                <img src="img/téléchargement.jpg" alt="UAT" class="logo">
                <div class="separator"></div>
                <img src="img/pop.jpg" alt="UAT" class="logo">

                <!-- <div class="university-name"><?= __('universite'); ?></div> -->
            </div>
        </div>

        <div class="menu-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>

        <div class="nav-container" id="nav-container">
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php"><?= __('Laboratoire'); ?></a></li>
                    <li><a href="index.php#mission"><?= __('Missions'); ?></a></li>
                    <li><a href="index.php#equipe"><?= __('Equipes'); ?></a></li>
                    <li><a href="#"><?= __('Innovation'); ?></a></li>
                    <li><a href="evenement.php"><?= __('Evenement'); ?></a></li>
                    <li><a href="index.php#about-labo"><?= __('propre'); ?></a></li>
                </ul>
            </nav>

            <div class="language-dropdown" id="languageDropdown">
                <button class="language-dropbtn">
                    <span id="currentLanguageText">
                        <?php 
                        switch($current_lang) {
                            case 'fr': echo 'Français'; break;
                            case 'ar': echo 'العربية'; break;
                            case 'en': echo 'English'; break;
                            default: echo 'Français';
                        }
                        ?>
                    </span>
                    <i class="fas fa-caret-down"></i>
                </button>
                <div class="language-dropdown-content">
                    <a href="?lang=fr" onclick="updateLanguageText('Français')">Français</a>
                    <a href="?lang=ar" onclick="updateLanguageText('العربية')">العربية</a>
                    <a href="?lang=en" onclick="updateLanguageText('English')">English</a>
                </div>
            </div>

            <div class="auth-buttons">
                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                    <a href="logout.php" class="auth-btn logout"><?= __('Logout'); ?></a>
                <?php else: ?>
                    <a href="login.php" class="auth-btn"><?= __('loginn'); ?></a>
                    <a href="register.php" class="auth-btn"><?= __('register'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <script>
        function toggleMenu() {
            const navContainer = document.getElementById('nav-container');
            navContainer.classList.toggle('nav-active');
        }

        function updateLanguageText(langText) {
            document.getElementById('currentLanguageText').textContent = langText;
            document.getElementById('languageDropdown').classList.remove('active');
        }

        const languageDropdown = document.getElementById('languageDropdown');
        const languageDropbtn = languageDropdown.querySelector('.language-dropbtn');
        
        languageDropbtn.addEventListener('click', function(e) {
            e.stopPropagation();
            languageDropdown.classList.toggle('active');
        });

        document.addEventListener('click', function() {
            languageDropdown.classList.remove('active');
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const lang = urlParams.get('lang');
            let langText = 'Français';
            
            if (lang === 'ar') {
                langText = 'العربية';
            } else if (lang === 'en') {
                langText = 'English';
            }
            
            document.getElementById('currentLanguageText').textContent = langText;
        });
    </script>
</body>
</html>