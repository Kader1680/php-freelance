<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Footer</title>
  <style>
    :root {
      --footer-color: #002147;
      --light-color: #ffffff;
      --secondary-color: #f39c12;
    }

    /* Sticky footer solution */
    html, body {
      height: 100%;
    }
    
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }
    
    main {
      flex: 1;
    }

    footer {
      background-color: var(--footer-color);
      color: var(--light-color);
      padding: 40px 5% 20px;
      margin-top: auto; /* Pushes footer to bottom */
    }

    .footer-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      max-width: 1200px;
      margin: 0 auto;
      gap: 30px;
    }

    .footer-section {
      flex: 1 1 250px;
      min-width: 250px;
    }

    .footer-logo img {
      width: 150px;
      height: auto;
      margin-bottom: 15px;
    }

    .footer-logo p {
      font-size: 14px;
      opacity: 0.9;
      line-height: 1.6;
      margin: 0 0 10px 0;
    }

    .footer-section h3 {
      font-size: 18px;
      margin-bottom: 15px;
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

    .footer-links,
    .footer-links ul {
      list-style: none;
      padding: 0;
      margin: 0;
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
      padding-left: 5px;
    }

    .social-links {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-links a {
      display: inline-block;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
    }

    .social-links a:hover {
      background-color: var(--secondary-color);
      transform: translateY(-3px);
    }

    .social-links a img {
      width: 18px;
      height: 18px;
      transition: transform 0.3s;
    }

    .contact-button {
      display: inline-block;
      padding: 10px 25px;
      border: 2px solid var(--secondary-color);
      color: var(--light-color);
      text-decoration: none;
      margin-top: 20px;
      transition: all 0.3s;
      border-radius: 4px;
      font-weight: 500;
    }

    .contact-button:hover {
      background-color: var(--secondary-color);
      color: #000;
    }

    .footer-bottom {
      text-align: center;
      padding-top: 20px;
      margin-top: 40px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      font-size: 14px;
      opacity: 0.8;
    }
    
    .footer-bottom p {
      margin: 5px 0;
    }

    /* Responsive adjustments */
    @media (max-width: 900px) {
      .footer-container {
        gap: 20px;
      }
      
      .footer-section {
        flex: 1 1 200px;
      }
    }

    @media (max-width: 768px) {
      footer {
        padding: 30px 5% 15px;
      }
      
      .footer-container {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        gap: 30px;
      }

      .footer-section {
        min-width: 100%;
      }

      .footer-section h3::after {
        left: 0;
        transform: none;
      }

      .social-links {
        justify-content: flex-start;
      }
    }
    
    @media (max-width: 480px) {
      footer {
        padding: 25px 5% 15px;
      }
      
      .footer-section h3 {
        font-size: 16px;
      }
      
      .footer-links a {
        font-size: 13px;
      }
      
      .footer-bottom {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

  <footer>
    <div class="footer-container">
      <div class="footer-section footer-logo">
        <img src="img/téléchargement.jpg" alt="École Polytechnique Logo" />
        <p><?= __('universite'); ?><br>
          <a href="index.php"><?= __('Laboratoire'); ?></a>
        </p>
      </div>

      <div class="footer-section footer-links">
        <h3><?= __("Piliers de l'X"); ?></h3>
        <ul>
          <li><a href="#"><?= __("Se former"); ?></a></li>
          <li><a href="#"><?= __("Enseigner et chercher"); ?></a></li>
          <li><a href="#"><?= __("Entreprendre et innover"); ?></a></li>
          <li><a href="#"><?= __("S'associer"); ?></a></li>
        </ul>
      </div>

      <div class="footer-section footer-links">
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

      <div class="footer-section">
        <h3><?= __("Réseaux sociaux"); ?></h3>
        <div class="social-links">
          <a href="#" aria-label="Facebook"><img src="img/icon/facebook-app-symbol.png" alt="Facebook" /></a>
          <a href="#" aria-label="YouTube"><img src="img/icon/youtube.png" alt="YouTube" /></a>
          <a href="#" aria-label="LinkedIn"><img src="img/icon/linkedin.png" alt="LinkedIn" /></a>
        </div>
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