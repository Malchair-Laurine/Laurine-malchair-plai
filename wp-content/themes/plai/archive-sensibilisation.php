<?php get_header(); ?>

<?php
$sensibilisations_page_title = get_field('sensibilisations_page_title', get_queried_object_id());
$sensibilisations_page_text = get_field('sensibilisations_page_text', get_queried_object_id());
?>


<?php
$args = [
        'post_type' => 'sensibilisation',
        'post_status' => 'publish',
        'posts_per_page' => 15,
];
$query = new WP_Query($args);
?>

<main class="sensibilisations-container">
    <header class="sensibilisations-header">
        <?php if ($sensibilisations_page_title) : ?>
            <h1 class="sensibilisations-header__title"><?= esc_html($sensibilisations_page_title) ?></h1>
        <?php endif; ?>

        <?php if ($sensibilisations_page_text) : ?>
            <p class="sensibilisations-header__description"><?= esc_html($sensibilisations_page_text) ?></p>
        <?php endif; ?>
    </header>

    <section class="sensibilisations-section">

        <div class="sensibilisations-grid">

            <?php if ($query->have_posts()) : while ($query->have_posts()) :
                $query->the_post(); ?>
                <?php
                $sensibilisations_title = get_field('sensibilisations_title', get_the_ID());
                $sensibilisations_text = get_field('sensibilisations_text', get_the_ID());

                ?>


                <a class="sensibilisations-card" href="<?= get_the_permalink() ?>" title="<?= get_the_title() ?>">
                    <h3 class="sensibilisations-card__title"><?= $sensibilisations_title ?></h3>
                    <p class="sensibilisations-card__description"><?= $sensibilisations_text ?></p>
                </a>

            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.') ?></p>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>




