<?php include 'includes/header.php'; ?>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #e8e2e2;
}
.hero {
position: relative;
width: 100%;
height: 500px;
overflow: hidden;
}

.hero img {
width: 100%;
height: 100%;
object-fit: cover; /* يضمن ملء الصورة بدون فقدان أجزاء منها */
filter: brightness(0.9) contrast(1.1);
}

/* الخط الأول */
.hero::before {
content: "";
position: absolute;
top: 20%;
left: 0;
width: 150%;
height: 4px;
background: rgba(255, 255, 255, 0.8);

transform: rotate(30deg);
pointer-events: none;
z-index: 2; /* تأكد من ظهوره فوق الصورة */

}

/* الخط الثاني */
.hero::after {
content: "";
position: absolute;
top: 50%;
left: 0;
width: 150%;
height: 4px;
background: rgba(255, 255, 255, 0.8);
transform: rotate(-30deg);
pointer-events: none;
z-index: 2;
}


.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(0, 0, 0, 0.6) 40%, rgba(0, 0, 0, 0) 60%);
}
.text-box {
    position: absolute;
    top: 50%;
    background: rgb(255, 255, 253);
    padding: 10px 20px ;
    
    margin-left: 10px;
    transform: translateY(-50%);
    border-radius: 10px;
    max-width: 600px;
   
    box-shadow: 0px 4px 8px rgba(232, 230, 230, 0.989);
    
}
.text-box h1 {
    font-size: 22px;
    font-weight: bold;
    color: #000;
}
.text-box p {
    font-size: 16px;
    line-height: 1.5;
}
.supervisor-section {
    background:rgb(222, 222, 218);
    padding: 40px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.info-container {
    display: flex;
    justify-content: space-between;
    max-width: 800px;
    width: 100%;
    margin-bottom: 20px;
}
.info-box {
    background-size: cover;
    background-position: center;
    padding: 40px ;
    margin-bottom: 40px;

    border-radius: 10px;
    flex: 1;
    margin: 0 10px;
    text-align: center;
    font-weight: bold;
    font-size: 25px;
    background-color: #002F67;
    color: rgb(5, 4, 10);
    
    position: relative;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s, filter 0.3s;
    width: 150px;
    height: 150px;
}
.info-box:hover {
    transform: scale(1.05);
    filter: brightness(0.8);
}
.info-box:nth-child(1) {
    background-image: url('img/memoire.jpeg');
}
.info-box:nth-child(2) {
    background-image: url('img/recherche.jpeg');
}
.info-box span {
    background-color: rgb(222, 222, 218);
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
}
.supervisor-title {
    font-family: 'Garamond', serif;
    font-size: 36px;
    font-weight: bold;
    text-align: center;
    position: relative;
    display: inline-block;
    padding-top: 10px;
    margin-top: 40px;
    margin-bottom: 20px;
}
.supervisor-container {
    display: flex;
    align-items: center;
    background: #f4f4f4;
    padding: 20px;
    border-radius: 10px;
    max-width: 800px;
}
.supervisor-container img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 20px;
}
.supervisor-info {
    text-align: left;
}
.supervisor-info h3 {
    font-size: 24px;
    margin-bottom: 10px;
}
.supervisor-info p {
    font-size: 16px;
    color: #555;
}

</style>
        <main>
        

            <div class="hero">
                <img src="img/pexels-pixabay-159298 (1).jpg" alt="Laboratoire">
                <div class="overlay"></div>
                <div class="text-box">
                    <h1>Mécanique - Structures & endommagement  </h1>
                    <p>
                        Aujourd'hui les acteurs industriels se livrent une concurrence afin de minimiser les coûts et d’améliorer la productivité.
                        Techniquement, une des préoccupations majeures consiste à garantir la durabilité et l'intégrité des pièces constitutives d'équipements
                        industriels, augmentés la productivité avec moi frais sur le coût total du produit. Les activités de recherche de l’équipe sont
                        orientées vers l’innovation et le développement durable, apporter un soutien concret (scientifique, technique et socio-économique)
                        et répondre au même temps aux problèmes rencontrés par les constructeurs tous domaine (génie civil, automobile, métallique..).
                        Les domaines d’application de l’équipe concernent aussi bien l’élaboration de nouveaux matériaux (caractérisation physique,
                        mécanique et thermomécanique). La mise à la disposition des industriels d’outils avancés prêts à l’emploi en vue de la simulation
                        de différents phénomènes physiques, mécaniques et de la conception de nouveaux matériaux et produits, présente un intérêt particulier pour l’équipe.
                    </p>
                </div>
            </div>
            
            <section class="supervisor-section">
                <div class="info-container">
                    <div class="info-box"><span>Mémoires de fin d'études</span></div>
                    <div class="info-box"><span>Recherches</span></div>
                </div>
                <div class="supervisor-title">Chef d'Équipe</div>
                <div class="supervisor-container">
                    <img src="img/prof/3D Cartoon Avatar of a Man Minimal 3D Character _ Premium AI-generated image.jpeg" alt="Professeur">
                    <div class="supervisor-info">
                        <h3>Dr. OUDAD Wahid</h3>
                        <p><strong>Poste:</strong> Professeur en Informatique</p>
                        <p><strong>Spécialité:</strong> Intelligence Artificielle et Systèmes Distribués</p>
                        <p><strong>Expérience:</strong> 15 ans dans l'enseignement et la recherche</p>
                        <p><strong>Équipe:</strong> Responsable du projet "Smart Data Lab"</p>
                        <p><strong>Publications:</strong> Auteur de plusieurs articles sur l'IA et le Big Data</p>
                        <p><strong>Contact:</strong> yassine.merad@univ-uat.dz</p>
                    </div>
                </div>
            </section>
        </main>
        
   
       
       
       
   
        <?php include 'includes/footer.php'; ?>