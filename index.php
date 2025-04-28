
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
            <div class="overlay"> <h1>LABORATOIRE INGENIERIE ET DEVELOPPEMENT DURABLE</h1>
            </div>
       
        <section id="equipe" class="labs">
            <div   class="lab">
                <h3>DMC</h3>
                <img src="img/Durabilité des matériaux de construction.jpeg" alt="Durabilité des matériaux de construction">
                <div class="lab-box"><a href="DMC.php">Durabilité des matériaux de construction</a></div>
            </div>
            <div class="lab">
                <h3>MSE </h3>
                <img src="img/Mécanique - Structures & endommagement.jpeg" alt="Mécanique - Structures & endommagement">
                <div class="lab-box"><a href="MSE.php">Mécanique - Structures & endommagement</a></div>
                
            </div>
            <div class="lab">
                <h3>MDSE </h3>
                <img src="img/Electric field in dielectric materials simulation.jpeg" alt="Matériaux diélectriques et simulation des phénomènes électriques">
                <div class="lab-box"><a href="MDSE.php">Matériaux diélectriques et simulation des phénomènes électriques</a></div>
            </div>
            <div class="lab">
                <h3>MMmn </h3>
                <img src="img/Modélisation mathématique des micronanostructure.jpeg" alt="Modélisation mathématique des micro/nanostructures">
                <div class="lab-box"><a href="MMmn.php">Modélisation mathématique des micro/nanostructures</a></div>
            </div>
            <div class="lab">
                <h3>EDPA </h3>
                <img src="img/Partial Differential Equations and Applications.jpeg" alt="Equations aux Dérivées Partielles et Applications ">
                <div class="lab-box"><a href="EDPA.php">Equations aux Dérivées Partielles et Applications</a></div>
            </div>
        </section>
        <br><br>
        <div id="mission" class="slider-container">
        <h1 class="slider-title">MISSION</h1>
        <div class="slider">
            <div class="slide" style="background-image: url('img/Design sans titre (3).png');">
                <div class="slide-content">Promotion et développement de nouvelles technologies</div>
            </div>
            <div class="slide" style="background-image: url('img/Design sans titre (2).png');">
                <div class="slide-content">Systèmes de conversion d’énergie et installations techniques</div>
            </div>
            <div class="slide" style="background-image: url('img/Design sans titre (1).png');">
                <div class="slide-content">Utilisation de nouveaux matériaux et structures adaptées</div>
            </div>
            <div class="slide" style="background-image: url('img/Design sans titre (4).png');">
                <div class="slide-content">Développement de méthodologies numériques et expérimentales</div>
            </div>
            <div class="slide" style="background-image: url('img/Formation des étudiants en Master et Doctorat.jpg');">
                <div class="slide-content">Formation des étudiants en Master et Doctorat</div>
            </div>
        </div>
        <button class="slider-btn prev">&#10094;</button>
        <button class="slider-btn next">&#10095;</button>
    </div>

   
    </section>
        <div  class="overlay-2 hidden">
    <h1 class="section-title">A LIRE AUSSI</h1>
    <div id="about-labo" class="description-box">
        <p>
            <strong>Le Laboratoire ingénierie et développement durable</strong> est un laboratoire de recherches agréé depuis Août 2022 par arrêté ministériel N°394.
            Il est rattaché à l'université d'Ain Témouchent. Les enseignants de profil génie civil, génie mécanique, génie électrique, mathématique et informatique 
            se sont assignés à créer une recherche scientifique pluridisciplinaire. La direction du laboratoire est assurée par le <strong>Dr. ATTIA Amina</strong>.
        </p>
        <p>
            Il a principalement pour missions : la <span class="highlight">promotion et le développement de nouvelles technologies</span>, des systèmes qui utilisent des nouveaux matériaux, 
            des structures mécaniques adéquates aux normes internationales, des systèmes de conversion d’énergie et d’installations techniques.
        </p>
        <p>
            Ces activités seront focalisées sur le développement de procédés, de méthodologies numériques et expérimentales et de les appliquer dans les domaines 
            des sciences de l’ingénieur (<span class="highlight">énergétique, mécanique des solides, science des matériaux, Génie électrique</span>).
        </p>
        <p>
            <i>Aussi, la formation des étudiants en Master et de doctorat, ainsi que la formation continue pour le secteur socio-économique.</i> 
            Il est composé de <strong>cinq (05) équipes de recherche pluridisciplinaires</strong> dont <strong>20 enseignants-chercheurs et 09 doctorants.</strong>
        </p>
    </div>
</div>


    <script src="script1.js"></script>

    </main>
 
    <?php include 'includes/footer.php'; ?>

 

