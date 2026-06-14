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
    <main class="sensibilisation" itemscope itemtype="https://schema.org/CreativeWork">

        <header class="sensibilisation__header">
            <h1 class="sensibilisation__title" itemprop="name"> <?= get_the_title() ?> </h1>

            <?php if ($sensibilisation_description) : ?>
                <p class="sensibilisation__description" itemprop="description"> <?= $sensibilisation_description ?> </p>
            <?php endif; ?>
        </header>

        <section class="reflexion-section" itemprop="hasPart" itemscope itemtype="https://schema.org/CreativeWork">

            <?php if ($reflexion_title) : ?>
                <h2 class="reflexion-section__title" itemprop="name"> <?= $reflexion_title ?> </h2>
            <?php endif; ?>

            <?php if ($pistes_text) : ?>
                <div class="reflexion-section__content" itemprop="text"> <?= $pistes_text ?> </div>
            <?php endif; ?>
        </section>

        <section class="outil-section" itemprop="hasPart" itemscope itemtype="https://schema.org/ItemList">

            <?php if ($outils_title) : ?>
                <h2 class="outil-section__title" itemprop="name"><?= $outils_title ?></h2>
            <?php endif; ?>

            <div class="outil-section__list">

                <?php foreach ($outils as $index => $outil) : ?>
                    <p class="outil-section__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="<?= $index + 1 ?>">
                        <span itemprop="name"><?= $outil['outil_text'] ?></span>
                    </p>
                <?php endforeach; ?>

            </div>

        </section>

    </main>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>