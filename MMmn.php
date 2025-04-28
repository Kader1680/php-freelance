<?php include 'includes/header.php'; ?>
        <main>
        

            <div class="hero">
                <img src="img/3640543.jpg" alt="Laboratoire">
                <div class="overlay"></div>
                <div class="text-box">
                    <h1>Modélisation mathématique des micro/nanostructures   </h1>
                    <p>
                        L’enjeu principal des recherches envisagées par cette équipe réside dans l'accompagnement et  le développement de nouveaux matériaux et nouveaux modèles mathématiques pour traiter les structures à multi échelle.
                        Nos recherches concernent les matériaux composites, et à gradient évalué. Elles s’effectuent sur une échelle  allant « du nano au macro » 
                        
                    </p>
                </div>
            </div>
            <section class="highlight-section">
                <div class="content">
                    <h2>Nos recherches visent aussi à :</h2>
                    <ul>
                        <li>🔬 Caractériser des matériaux.</li>
                        <li>🛠️ Concevoir des matériaux ayant une fonctionnalité donnée.</li>
                        <li>📏 Trouver à l’échelle du nano, la forme appropriée du matériau.</li>
                        <li>💡 Assurer un soutien technique dans le domaine des nanomatériaux.</li>
                        <li>📊 Développer de nouveaux modèles mathématiques pour les matériaux intelligents.</li>
                    </ul>
                </div>
            </section>
  
            
            <section class="supervisor-section">
                <div class="info-container">
                    <div class="info-box"><span>Mémoires de fin d'études</span></div>
                    <div class="info-box"><span>Recherches</span></div>
                </div>
                <div class="supervisor-title">Chef d'Équipe</div>
                <div class="supervisor-container">
                    <img src="img/prof/téléchargement (4).png" alt="Professeur">
                    <div class="supervisor-info">
                        <h3>Dr. ATTIA Amina</h3>
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
       
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let highlightSection = document.querySelector(".highlight-section");

            function checkScroll() {
                let sectionPos = highlightSection.getBoundingClientRect().top;
                let screenPos = window.innerHeight / 1.2;

                if (sectionPos < screenPos) {
                    highlightSection.classList.add("show");
                }
            }

            window.addEventListener("scroll", checkScroll);
        });
    </script>
<?php include 'includes/footer.php'; ?>