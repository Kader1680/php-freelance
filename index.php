
<?php 

include 'includes/header.php'; 

 
// if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
//     header("location: login.php");
//     exit;
// }

?>


    <main>

     
        <div class="video-header">
            <video autoplay muted loop>
                <source src="img/vd2.mp4" type="video/mp4">
                 
            </video>
            <div class="overlay"> <h1><?= __('head'); ?></h1>
            </div>
       
        <section id="equipe" class="labs">
            <div   class="lab">
                <h3><?= __('DMC'); ?></h3>
                <img src="img/Durabilité des matériaux de construction.jpeg" alt="Durabilité des matériaux de construction">
                <div class="lab-box"><a href="DMC.php"><?= __('Durabilité'); ?></a></div>
            </div>
            <div class="lab">
                <h3><?= __('MSE'); ?> </h3>
                <img src="img/Mécanique - Structures & endommagement.jpeg" alt="Mécanique - Structures & endommagement">
                <div class="lab-box"><a href="MSE.php"><?= __('Mécanique'); ?></a></div>
                
            </div>
            <div class="lab">
                <h3><?= __('MDSE'); ?> </h3>
                <img src="img/Electric field in dielectric materials simulation.jpeg" alt="Matériaux diélectriques et simulation des phénomènes électriques">
                <div class="lab-box"><a href="MDSE.php"><?= __('Matériaux'); ?></a></div>
            </div>
            <div class="lab">
                <h3><?= __('MMmn'); ?>  </h3>
                <img src="img/Modélisation mathématique des micronanostructure.jpeg" alt="Modélisation mathématique des micro/nanostructures">
                <div class="lab-box"><a href="MMmn.php"><?= __('Modélisation'); ?> </a></div>
            </div>
            <div class="lab">
                <h3><?= __('EDPA'); ?>  </h3>
                <img src="img/Partial Differential Equations and Applications.jpeg" alt="Equations aux Dérivées Partielles et Applications ">
                <div class="lab-box"><a href="EDPA.php"><?= __('Equations'); ?> </a></div>
            </div>
        </section>
        <br><br>
        <div id="mission" class="slider-container">
        <h1 class="slider-title"><?= __('MISSION'); ?></h1>
        <div class="slider">
            <div class="slide" style="background-image: url('img/Design sans titre (3).png');">
                <div class="slide-content"><?= __('Promotion'); ?></div>
            </div>
            <div class="slide" style="background-image: url('img/Design sans titre (2).png');">
                <div class="slide-content"><?= __('Systèmes'); ?></div>
            </div>
            <div class="slide" style="background-image: url('img/Design sans titre (1).png');">
                <div class="slide-content"><?= __('Utilisation'); ?> </div>
            </div>
            <div class="slide" style="background-image: url('img/Design sans titre (4).png');">
                <div class="slide-content"><?= __('Développement'); ?></div>
            </div>
            <div class="slide" style="background-image: url('img/Formation des étudiants en Master et Doctorat.jpg');">
                <div class="slide-content"><?= __('Formation'); ?></div>
            </div>
        </div>
        <button class="slider-btn prev">&#10094;</button>
        <button class="slider-btn next">&#10095;</button>
    </div>

   
    </section>
        <div  class="overlay-2 hidden">
    <h1 class="section-title"><?= __('lire'); ?></h1>
    <div id="about-labo" class="description-box">
        <p>
            <?= __('pri'); ?>.
        </p>
        <p>
        <?= __('sec'); ?>
        </p>
        <p>
        <?= __('thr'); ?>
            
        </p>
        <p>
        <?= __('fou'); ?>
          
        </p>
    </div>
</div>


    <script src="script1.js"></script>

    </main>
 
    <?php include 'includes/footer.php'; ?>

 

