<?php include 'includes/header.php'; ?>
 
<main>
    <div class="hero">
        <img src="img/,.jpeg" alt="<?= __('lab_image_alt'); ?>">
        <div class="overlay"></div>
        <div class="text-box">
            <h1><?= __('Durabilité des matériaux de construction '); ?></h1>
            <p>Les travaux de l’équipe s’inscrivent dans le domaine de réparation, réhabilitation des structures en génie civil ( poutres, plaques, coques…)  La priorité sera donnée au Renforcement des structures par les matériaux composites. Le groupe mènera des recherches reconnues aux niveaux national et international tout en formant d'excellents chercheurs en génie civil. </p>
        </div>
    </div>
    
    <section class="supervisor-section">
        <div class="info-container">
            <div class="info-box"><span><?= __('memory_label'); ?></span></div>
            <div class="info-box"><span><?= __('research_label'); ?></span></div>
        </div>
        <div class="supervisor-title"><?= __('supervisor_section_title'); ?></div>
        <div class="supervisor-container">
            <img src="img/prof/Perfil de chico con terno.jpeg" alt="<?= __('prof_image_alt'); ?>">
            <div class="supervisor-info">
                <h3><?= __('khaled_name'); ?></h3>
                <p><strong><?= __('position_label'); ?></strong> <?= __('position'); ?></p>
                <p><strong><?= __('specialty_label'); ?></strong> <?= __('specialty'); ?></p>
                <p><strong><?= __('experience_label'); ?></strong> <?= __('experience'); ?></p>
                <p><strong><?= __('team_label'); ?></strong> <?= __('team'); ?></p>
                <p><strong><?= __('publications_label'); ?></strong> <?= __('publications'); ?></p>
                <p><strong><?= __('contact_label'); ?></strong> <?= __('contact'); ?></p>
            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
