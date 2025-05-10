<?php include 'includes/header.php'; ?>
<main>
    <div class="hero">
        <img src="img/Magnetic field due to solenoid o__.jpeg" alt="Laboratoire">
        <div class="overlay"></div>
        <div class="text-box">
            <h1><?= __('hero_title'); ?></h1>
            <p><?= __('hero_paragraph'); ?></p>
        </div>
    </div>

    <section class="supervisor-section">
        <div class="info-container">
            <div class="info-box"><span><?= __('memory_label'); ?></span></div>
            <div class="info-box"><span><?= __('research_label'); ?></span></div>
        </div>
        <div class="supervisor-title"><?= __('supervisor_section_title'); ?></div>
        <div class="supervisor-container">
            <img src="img/prof/Free images Generated with AI.jpeg" alt="Professeur">
            <div class="supervisor-info">
                <h3><?= __('prof_name'); ?></h3>
                <p><strong><?= __('position'); ?></strong></p>
                <p><strong><?= __('specialty'); ?></strong></p>
                <p><strong><?= __('experience'); ?></strong></p>
                <p><strong><?= __('team'); ?></strong></p>
                <p><strong><?= __('publications'); ?></strong></p>
                <p><strong><?= __('contact'); ?></strong></p>
            </div>
        </div>
    </section>
</main>
<?php include 'includes/footer.php'; ?>
