<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Laboratoires - Evenement</title>
    <link rel="stylesheet" href="css/global.css">  
    <link rel="stylesheet" href="css/<?php echo basename($_SERVER['PHP_SELF'], '.php'); ?>.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="img/téléchargement.jpg" alt="UAT" class="logo">
            <div class="separator"></div>
            <div class="university-name">Université Ain Temouchent</div>
        </div>
            
        <nav>
            <ul>
                <li><a href="index.php">Laboratoire</a></li>
                <li><a href="index.php#mission">Missions</a></li>
                <li><a href="index.php#equipe">Equipes</a></li>
                <li><a href="#">Innovation</a></li>
                <li><a href="evenement.php">Evenement</a></li>
                <li><a href="index.php#about-labo">À propos du Labo</a></li>
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
        <h1>Bienvenue sur le site des Laboratoires</h1>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <p>Bonjour, <?php echo htmlspecialchars($_SESSION['fname']); ?> !</p>
        <?php else: ?>
            <p>Veuillez vous connecter ou vous inscrire pour continuer.</p>
        <?php endif; ?>
    </main>

</body>
</html>
