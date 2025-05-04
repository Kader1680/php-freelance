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
