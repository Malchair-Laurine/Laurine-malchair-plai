<?php
/*
 * Template Name: //My space
 */
?>

<?php get_header(); ?>

<?php

$main_title = get_field('main_title');
$title_span = get_field('title_span');
$main_subtitle = get_field('main_subtitle');
$referent_title = get_field('referent_title');
$referent_description = get_field('referent_description');
$referent_contact = get_field('referent_contact');
$steps_title = get_field('steps_title');
$steps = get_field('steps');
$skills_profile_title = get_field('skills_profile_title');
$skills_profile = get_field('skills_profile');


?>
<main class="my-space-page">

    <header class="my-space-page__header">
        <?php if ($main_title !== '') : ?>
            <h1 class="my-space-page__title"><?= $main_title ?></h1>
            <span class="my-space-page__span"><?= $title_span ?></span>
        <?php endif; ?>

        <?php if ($main_subtitle !== '') : ?>
            <p class="my-space-page__description"><?= $main_subtitle ?></p>
        <?php endif; ?>
    </header>

    <section class="referent-section">
        <div class="referent-section__body">
            <?php if ($referent_title !== '') : ?>
                <h2 class="referent-section__title"><?= $referent_title ?></h2>
            <?php endif; ?>

            <?php if ($referent_description !== '') : ?>
                <p class="referent-section__description"><?= $referent_description ?></p>
            <?php endif; ?>
        </div>

        <?php if ($referent_contact !== '') : ?>
            <div class="referent-card__contact"><?= $referent_contact ?></div>
        <?php endif; ?>
    </section>

    <section class="process-section">
        <?php if ($steps_title !== '') : ?>
            <h2 class="process-section__title"><?= $steps_title ?></h2>
        <?php endif; ?>

        <div class="process-section__grid">
            <?php foreach ($steps as $step) : ?>
                <article class="card-step">
                    <span class="card-step__number"><?= $step['step_number'] ?></span>
                    <h3 class="card-step__title"><?= $step['step_title'] ?></h3>
                    <p class="card-step__text"><?= $step['step_text'] ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="skills-section">
        <?php if ($skills_profile_title !== '') : ?>
            <h2 class="skills-section__title"><?= $skills_profile_title ?></h2>
        <?php endif; ?>
        <div class="skills-section__grid">
            <?php foreach ($skills_profile as $skill) : ?>
                <article class="card-skill">
                    <h3 class="card-skill__title"><?= $skill['skill_profile_title'] ?></h3>
                    <p class="card-skill__text"><?= $skill['skill_profile_text'] ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <?php
    $last_sensi_id = \wtl\Helpers::get_field('last_sensibilisation');

    $last_sensibilisation_title = get_field('last_sensibilisation_title', $last_sensi_id);
    $last_sensibilisation_text = get_field('last_sensibilisation_text', $last_sensi_id);
    $last_sensibilisation_link = get_field('last_sensibilisation_link', $last_sensi_id);
    ?>

    <section class="banner-section">
        <h2 class="banner-section__title"><?= $last_sensibilisation_title ?></h2>
        <p class="banner-section__text"><?= $last_sensibilisation_text ?></p>
        <a class="banner-section__button" href="<?= get_the_permalink($last_sensi_id) ?>"
           title="Lien vers la sensibilisation" : <?= get_the_title() ?>
           target="_blank">
            Voir la sensibilisation
        </a>
    </section>
</main>


