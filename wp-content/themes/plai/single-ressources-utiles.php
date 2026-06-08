<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php
    $ressource_title = get_the_title();
    $ressource_slogan = get_field('ressource_slogan');
    $ressource_description = get_field('ressource_description');
    $ressource_links = get_field('ressource_links');
    $ressource_functionality_title = get_field('ressource_functionality_title');
    $ressource_functionalities = get_field('ressource_functionalities');
    $ressource_pedagogical = get_field('ressource_pedagogical');
    $ressource_pedagogical_text = get_field('ressource_pedagogical_text');
    $all_ressource_title = get_field('all_ressource_title');

    $all_ressource_link = get_field('all_ressource_link');
    ?>
    <main class="ressource">

        <header class="ressource__header">
            <h1 class="ressource__title"> <?= $ressource_title ?> </h1>

            <?php if ($ressource_slogan) : ?>
                <p class="ressource__slogan"> <?= $ressource_slogan ?> </p>
            <?php endif; ?>

            <?php if ($ressource_description) : ?>
                <p class="ressource__description"> <?= $ressource_description ?> </p>
            <?php endif; ?>

            <?php if (!empty($ressource_links) && is_array($ressource_links)) : ?>
                <?php foreach ($ressource_links as $link) : ?>
                    <?php if (!empty($link['ressource_link']['url'])) : ?>
                        <a class="btn-primary" href="<?= esc_url($link['ressource_link']['url']) ?>"><?= esc_html($link['ressource_link']['title'] ?? 'Lien vers...') ?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>

        </header>

        <section class="functionality-section">

            <?php if ($ressource_functionality_title) : ?>
                <h2 class="functionality-section__title"> <?= $ressource_functionality_title ?> </h2>
            <?php endif; ?>

            <ul class="functionality-section__list">
                <?php foreach ($ressource_functionalities as $functionality) : ?>
                    <?php if (!empty($functionality['ressource_functionality'])) : ?>
                        <li><?= esc_html($functionality['ressource_functionality']) ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

        </section>

        <section class="pedagogical-section">

            <?php if ($ressource_pedagogical) : ?>
                <h2 class="pedagogical-section__title"> <?= $ressource_pedagogical ?></h2>
            <?php endif; ?>

            <?php if ($ressource_pedagogical_text) : ?>
                <p class="pedagogical-section__text"><?= $ressource_pedagogical_text ?> </p>
            <?php endif; ?>
        </section>


        <div class="all-ressources">
                <h2 class="all-ressources__title">Vous souhaitez avoir accès à d'autres ressources utiles ?</h2>

            <?php if (!empty($all_ressource_link['url'])) : ?>
                <a class="btn-primary"
                   href="<?= esc_url($all_ressource_link['url']) ?>"
                        <?= !empty($all_ressource_link['target']) ? 'target="' . esc_attr($all_ressource_link['target']) . '"' : '' ?>>
                    <?= !empty($all_ressource_link['title']) ? esc_html($all_ressource_link['title']) : "D'autres ressources" ?>
                </a>
            <?php endif; ?>
        </div>

    </main>
<?php endwhile; endif; ?>

<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>