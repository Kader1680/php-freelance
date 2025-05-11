<?php include 'includes/header.php'; ?>

 
<main>

    <div class="hero">
        <img src="img/pexels-olly-3768126.jpg" alt="<?= __('lab_alt_text'); ?>">
        <div class="overlay"></div>
        <div class="text-box">
            <h1><?= __('partial_diff_hero_title'); ?></h1>
            <p><?= __('partial_diff_hero_paragraph1'); ?></p>
            <p><?= __('partial_diff_hero_paragraph2'); ?></p>
        </div>
    </div>

    <section class="supervisor-section">
        <div class="info-container">
            <div class="info-box"><span><?= __('memory_label'); ?></span></div>
            <div class="info-box"><span><?= __('research_label'); ?></span></div>
        </div>
        <div class="supervisor-title"><?= __('supervisor_section_title'); ?></div>
        <div class="supervisor-container">
            <img src="img/prof/Professor Fred (Em Busca de Conhecimento).jpeg" alt="<?= __('professor_alt_text'); ?>">
            <div class="supervisor-info">
                <h3><?= __('beniani_name'); ?></h3>
                <p><strong><?= __('position_label'); ?></strong> <?= __('position_value'); ?></p>
                <p><strong><?= __('specialty_label'); ?></strong> <?= __('specialty_value'); ?></p>
                <p><strong><?= __('experience_label'); ?></strong> <?= __('experience_value'); ?></p>
                <p><strong><?= __('team_label'); ?></strong> <?= __('team_value'); ?></p>
                <p><strong><?= __('publications_label'); ?></strong> <?= __('publications_value'); ?></p>
                <p><strong><?= __('contact_label'); ?></strong> yassine.merad@univ-uat.dz</p>
            </div>
        </div>
    </section>

</main>
<?php include 'includes/footer.php'; ?>
