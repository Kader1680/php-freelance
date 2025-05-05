

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    
        footer {
            background-color: var(--footer-color);
            color: var(--light-color);
            padding: 40px 5% 20px;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 30px;
            padding: 0 15px;
        }

        .footer-logo img {
            width: 150px;
            margin-bottom: 15px;
        }

        .footer-logo p {
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .footer-section h3 {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h3::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--secondary-color);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: var(--light-color);
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s;
            display: inline-block;
        }

        .footer-links a:hover {
            color: var(--secondary-color);
            transform: translateX(5px);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            color: var(--light-color);
            font-size: 20px;
            transition: all 0.3s;
        }

        .social-links a:hover {
            color: var(--secondary-color);
            transform: translateY(-3px);
        }

        .contact-button {
            display: inline-block;
            padding: 10px 25px;
            border: 2px solid var(--secondary-color);
            color: var(--light-color);
            text-decoration: none;
            margin-top: 20px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .contact-button:hover {
            background-color: var(--secondary-color);
            color: var(--light-color);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            margin-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            opacity: 0.8;
        }

        @media (max-width: 992px) {
            .nav-links {
                margin-right: 10px;
            }
            
            .nav-links li {
                margin: 0 8px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
                position: relative;
            }

            .menu-toggle {
                display: block;
                order: 1;
            }

            .logo-container {
                order: 2;
                flex: 1;
                justify-content: center;
            }

            .language-toggle {
                order: 3;
                margin: 15px 0;
                width: 100%;
                justify-content: center;
            }

            nav {
                order: 4;
                width: 100%;
                display: none;
            }

            .nav-links {
                flex-direction: column;
                width: 100%;
                margin: 20px 0 0;
            }

            .nav-links li {
                margin: 5px 0;
                text-align: center;
            }

            .auth-buttons {
                order: 5;
                width: 100%;
                justify-content: center;
                margin-top: 15px;
            }

            .nav-active {
                display: block;
            }

            .footer-section {
                min-width: 50%;
            }
        }

        @media (max-width: 576px) {
            .university-name {
                display: none;
            }

            .separator {
                display: none;
            }

            .footer-section {
                min-width: 100%;
                text-align: center;
            }

            .footer-section h3::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .social-links {
                justify-content: center;
            }
        }

</style>
<body>
    
<footer>
    <div class="footer-container">
        <div class="footer-logo">
            <img src="img/téléchargement.jpg" alt="École Polytechnique Logo">
            <p><?= __('universite'); ?><br>
                <a href="index.php"><?= __('Laboratoire'); ?></a>
            </p>
        </div>

        <div class="footer-links">
            <div class="column">
                <h3><?= __("Piliers de l'X"); ?></h3>
                <ul>
                    <li><a href="#"><?= __("Se former"); ?></a></li>
                    <li><a href="#"><?= __("Enseigner et chercher"); ?></a></li>
                    <li><a href="#"><?= __("Entreprendre et innover"); ?></a></li>
                    <li><a href="#"><?= __("S'associer"); ?></a></li>
                </ul>
            </div>

            <div class="column">
                <h3><?= __("Accès rapides"); ?></h3>
                <ul>
                    <li><a href="#"><?= __("Histoire de l'école"); ?></a></li>
                    <li><a href="#"><?= __("Responsabilité sociétale et environnementale"); ?></a></li>
                    <li><a href="#"><?= __("Soutenabilité"); ?></a></li>
                    <li><a href="#"><?= __("Égalité des chances"); ?></a></li>
                    <li><a href="#"><?= __("Ouverture internationale"); ?></a></li>
                    <li><a href="#"><?= __("Annuaire"); ?></a></li>
                    <li><a href="#"><?= __("Intranet"); ?></a></li>
                </ul>
            </div>
        </div>

        <div class="footer-social">
            <a href="#"><img src="img/icon/facebook-app-symbol.png" alt="Facebook"></a>
            <a href="#"><img src="img/icon/youtube.png" alt="YouTube"></a>
            <a href="#"><img src="img/icon/linkedin.png" alt="LinkedIn"></a>
        </div>

        <div class="footer-contact">
            <a href="#" class="contact-button"><?= __("Contactez-nous"); ?></a>
        </div>
    </div>

    <div class="footer-bottom">
        <p><?= __("Mentions légales • Accessibilité numérique • Politique de protection des données • Plan du site • Gestion des cookies"); ?></p>
        <p><?= __("Réalisation"); ?> <a href="#">Net.Com</a> 2025<?= date("Y"); ?></p>
    </div>
</footer>

</body>
</html>
