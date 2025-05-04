<?php
session_start();

 
include "./translate.php"
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">  
    <link rel="stylesheet" href="css/<?php echo basename($_SERVER['PHP_SELF'], '.php'); ?>.css">
    <title>Laboratoires - Evenement</title>

    <link rel="stylesheet" href="css/global.css">  
    
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="img/téléchargement.jpg" alt="UAT" class="logo">
            <div class="separator"></div>
            <div class="university-name"><?= __('universite'); ?></div>
        </div>

    
        <a style="color: white;" href="?lang=fr">francais</a>|<a style="color: white;" href="?lang=ar">العربية</a>
            
        <nav>
            <ul>
                <li><a href="index.php"><?= __('Laboratoire'); ?></a></li>
                <li><a href="index.php#mission"><?= __('Missions'); ?></a></li>
                <li><a href="index.php#equipe"><?= __('Equipes'); ?></a></li>
                <li><a href="#"><?= __('Innovation'); ?></a></li>
                <li><a href="evenement.php"><?= __('Evenement'); ?></a></li>
                <li><a href="index.php#about-labo"><?= __('propre'); ?></a></li>
            </ul>
        </nav>

        <div class="navbar">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <form action="logout.php" method="post">
                    <input type="submit" value="Logout" class="login-btn">
                </form>
            <?php else: ?>
                <div style="display: flex;">
                <form action="login.php" method="get">
                    <input type="submit" value="Login" class="login-btn">
                </form>
                <form action="register.php" method="get">
                    <input type="submit" value="Register" class="login-btn">
                </form>
                </div>
             
            <?php endif; ?>
        </div>
    </header>

    <main>
        <h1><?= __('Veuillez'); ?></h1>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <p>Bonjour, <?php echo htmlspecialchars($_SESSION['fname']); ?> !</p>
        <?php else: ?>
            <p><?= __('Veuillez'); ?></p>
        <?php endif; ?>
    </main>


    <script>
        function toggleMenu() {
            const navLinks = document.getElementById('nav-links');
            navLinks.classList.toggle('show');
        }
    </script>


</body>
</html>
