<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) :
    the_post(); ?>

    <?php
    $sensibilisations_title = get_the_title();
    $sensibilisation_description = get_field('sensibilisation_description');
    $reflexion_title = get_field('reflexion_title');
    $pistes_text = get_field('pistes_text');
    $outils_title = get_field('outils_title');
    $outils = get_field('outils');
    ?>
    <main class="sensibilisation">

        <header class="sensibilisation__header">
            <h1 class="sensibilisation__title"> <?= get_the_title() ?> </h1>

            <?php if ($sensibilisation_description) : ?>
                <p class="sensibilisation__description"> <?= $sensibilisation_description ?> </p>
            <?php endif; ?>
        </header>

        <section class="reflexion-section">

            <?php if ($reflexion_title) : ?>
                <h2 class="reflexion-section__title"> <?= $reflexion_title ?> </h2>
            <?php endif; ?>

            <?php if ($pistes_text) : ?>
                <div class="reflexion-section__content"> <?= $pistes_text ?> </div>
            <?php endif; ?>
        </section>

        <section class="outil-section">

            <?php if ($outils_title) : ?>
                <h2 class="outil-section__title"> <?= $outils_title ?></h2>
            <?php endif; ?>

            <div class="outil-section__list">

            <?php foreach ($outils as $outil) : ?>
                <p class="outil-section__item"><?= $outil ['outil_text'] ?></p>
            <?php endforeach; ?>

            </div>

        </section>

    </main>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
