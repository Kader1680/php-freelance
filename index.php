
<?php 

include 'includes/header.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratoires - home</title>
 
</head>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body, html {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #e2e2e2f6;
    scroll-behavior: smooth;
}
.video-header {
position: relative;
width: 100%;
height: 300px; /* ارتفاع الفيديو */

margin-bottom: 2000px; /* إضافة مساحة فارغة تحت الفيديو */

}
.video-header video {
width: 100%;
height: 100%;
object-fit: cover;

}
.overlay {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(0, 0, 0, 0.4); /* شفافية خفيفة */
display: flex;
justify-content: center;
align-items: center;
color: white;
text-align: center;
}
.overlay2 {
padding-top: 50px;
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(0, 0, 0, 0.4); /* شفافية خفيفة */
display: flex;
justify-content: center;
align-items: center;
color: white;
text-align: center;
}
main {
    position: relative;
    z-index: 1; /* تأكد من أن المحتوى يظهر فوق الفيديو */
   
    text-align: center;
    padding: 20px;
}
h1{
    font-family: 'Garamond', serif;
    font-size: 36px;
font-weight: bold;
text-align: center;
position: relative;
display: inline-block;
padding-bottom: 10px;
    
}
h1::after{
    content: "";
display: block;
width: 200px; /* طول الخط */
height: 3px; /* سماكة الخط */
background-color: #b58e53; /* لون الخط مشابه للصورة */
margin: 10px auto 0; /* توسيط الخط أسفل النص */
}
.overlay-2 h1{
    
    font-family: 'Garamond', serif;
    font-size: 50px;
font-weight: bold;
text-align: center;
position: relative;
display: inline-block;
padding-bottom: 10px;
}


.labs {
    padding-top: 100px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
}
h3{
    padding: -20px;
    margin: 5px;
}
.lab {
    background: white;
    padding: 0px 55px;
    
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100px;
}
.lab img {
    width: 190%;
    margin: 10px -50px;
    border-radius: 2px;
}
.lab:hover{
    
    box-shadow:#b58e53 0px 8px 24px;;
}


.lab-box {
border: 2px solid #b58e53; /* لون الإطار */
padding: 5px;
margin: 10px -30px; /* توسيط العنصر أفقيًا */
display: flex;
justify-content: center; /* توسيط النص أفقيًا */
align-items: center; /* توسيط النص عموديًا */
width: 150px; /* ضبط العرض حسب الحاجة */
font-family: 'Times New Roman', serif;
font-size: 12px;
font-weight: normal;
background-color: white;
text-align: center;
}
.lab-box a{
    color: black;
    text-decoration: none;
}

.lab-box:hover {
background-color: #caa75c; /* لون ذهبي مشابه للصورة */
color: white;
border: 3px double black; /* إضافة إطار خارجي أسود عند التمرير */

transform: scale(1.05); /* تكبير خفيف */
box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
}
/* تحسين العنوان */
.section-title {
    padding-top: 20px;
    font-size: 2.5rem;
    font-weight: bold;
    text-align: center;
    color: #000000;
    text-transform: uppercase;
    letter-spacing: 3px;
    margin-bottom: 20px;
    position: relative;
}

/* إضافة خط تحت العنوان */
.section-title::after {
    content: "";
    display: block;
    width: 80px;
    height: 5px;
    background-color: #c19a6b;
    margin: 10px auto;
    border-radius: 3px;
}

/* تحسين صندوق النص */
.description-box {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    
    background: linear-gradient(135deg, #f7f3e9, #eae2d7);
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(191, 157, 57, 0.901);
    font-size: 1.2rem;
    line-height: 1.6;
    color: #000000;
    text-align: center;
    opacity: 1; /* يتم تفعيل الأنيميشن عبر JavaScript */
    transform: translateY(0);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}

/* جعل النص يظهر بسلاسة عند التمرير */
.description-box.visible {
    opacity: 1;
    transform: translateY(0);
}

/* إخفاء العنصر عند البداية */
.hidden {
    opacity: 1;
    transform: translateY(50px);
    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
}
.section-title {
    font-size: 2rem;
    font-weight: bold;
    margin: 20px 0;
    
}

.slider-container {
    position: relative;
    width: 100%;
    max-width: 900px;
    margin: 50px auto;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
    
}
.slider-title{
    font-size: 2rem;
    font-weight: bold;
    margin: 20px 0;
  


}

.slide {
    min-width: 100%;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    background-size: cover;
    background-position: center;
    transition: opacity 0.5s ease-in-out ;
   
}

.slide-content {
    background: rgba(3, 3, 3, 0.398);
    backdrop-filter: blur(8px);
    padding: 20px;
    color: #f2eaea;
    text-align: center;
    border-radius: 8px;
    max-width: 80%;
    font-family: 'Garamond', serif;
    font-size: 36px;
font-weight: bold;
text-align: center;

}

.slider-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 20px;
    border-radius: 50%;
   
}
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    cursor: pointer;
    padding: 10px 15px;
    font-size: 20px;
}

.prev { left: 10px; }
.next { right: 10px; }
    </style>
</head>
<body>
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
</body>
</html>
   
 
    <?php include 'includes/footer.php'; ?>

 

