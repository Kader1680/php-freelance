<?php include 'includes/header.php'; ?>
<style>
            @media(max-width: 767px){
                .text-box{
                
                width: 80%;
            margin: auto;
            transform: translate(-50%, -50%);
            left: 50%;
        }
                }
            .info-container {
            display: block;
            width: fit-content;
            }
            .info-box {
            margin-bottom: 40px;
            }
            .supervisor-container {
        display: block;
        
    }
    .supervisor-container img {
        display: flex;
        
        margin: auto;
    }

        .info-container {
        display: block;
        
    }


        

        @media(min-width: 767px){
        .supervisor-container {
            display: flex;   
            }
            .supervisor-container img {
                margin-right: 20px;
            }
            .info-container {
        display: flex;
        justify-content: space-between;
        
            }
        .info-box {
        
            
            width: 290px;
            height: 150px;
        }
        }


        .info-box span{
        
                top: 50%;
                position: absolute;
                left: 50%;
                transform: translate(-50%, -50%);
                font-size: 2rem;
                width: max-content;
        }

    


</style>
<main>
    <div class="hero">
        <img src="img/pexels-pixabay-159298 (1).jpg" alt="<?= __('Laboratory'); ?>">
        <div class="overlay"></div>
        <div class="text-box">
            <h1><?= __('Mechanics - Structures & Damage'); ?></h1>
            <p>
                <?= __("Today, industrial players are competing..."); ?>
            </p>
        </div>
    </div>
    
    <section class="supervisor-section">
        <div class="info-container">
            <div class="info-box"><span><?= __("Graduation Projects"); ?></span></div>
            <div class="info-box"><span><?= __("Researches"); ?></span></div>
        </div>
        <div class="supervisor-title"><?= __("Team Leader"); ?></div>
        <div class="supervisor-container">
            <img src="img/prof/3D Cartoon Avatar of a Man Minimal 3D Character _ Premium AI-generated image.jpeg" alt="<?= __('Professor'); ?>">
            <div class="supervisor-info">
                <h3><?= __('Dr. OUDAD Wahid'); ?></h3>
                <p><strong><?= __('Position:'); ?></strong> <?= __('Computer Science Professor'); ?></p>
                <p><strong><?= __('Specialty:'); ?></strong> <?= __('Artificial Intelligence and Distributed Systems'); ?></p>
                <p><strong><?= __('Experience:'); ?></strong> <?= __('15 years in teaching and research'); ?></p>
                <p><strong><?= __('Team:'); ?></strong> <?= __('Leader of the "Smart Data Lab" project'); ?></p>
                <p><strong><?= __('Publications:'); ?></strong> <?= __('Author of several articles on AI and Big Data'); ?></p>
                <p><strong><?= __('Contact:'); ?></strong> yassine.merad@univ-uat.dz</p>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
