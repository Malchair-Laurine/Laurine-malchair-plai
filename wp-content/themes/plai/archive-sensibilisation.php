<?php
/* Template Name: Sensibilisations */
?>
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

    <main class="sensibilisations-container" itemscope itemtype="https://schema.org/CollectionPage">
        <header class="sensibilisations-header">
            <?php if ($sensibilisations_page_title) : ?>
                <h1 class="sensibilisations-header__title" itemprop="name"><?= esc_html($sensibilisations_page_title) ?></h1>
            <?php endif; ?>

            <?php if ($sensibilisations_page_text) : ?>
                <p class="sensibilisations-header__description" itemprop="description"><?= esc_html($sensibilisations_page_text) ?></p>
            <?php endif; ?>
        </header>

        <section class="sensibilisations-section">

            <div class="sensibilisations-grid" itemprop="mainContentOfPage" itemscope itemtype="https://schema.org/ItemList">

                <?php if ($query->have_posts()) :
                    $position = 0;
                    while ($query->have_posts()) :
                        $query->the_post();
                        $position++;
                        ?>
                        <?php
                        $sensibilisations_title = get_field('sensibilisations_title', get_the_ID());
                        $sensibilisations_text = get_field('sensibilisations_text', get_the_ID());

                        ?>


                        <a class="sensibilisations-card" href="<?= get_the_permalink() ?>" title="<?= esc_attr(get_the_title()) ?>"
                           itemprop="itemListElement" itemscope itemtype="https://schema.org/CreativeWork">
                            <meta itemprop="position" content="<?= $position ?>">
                            <meta itemprop="url" content="<?= get_the_permalink() ?>">
                            <h3 class="sensibilisations-card__title" itemprop="name"><?= esc_html($sensibilisations_title) ?></h3>
                            <p class="sensibilisations-card__description" itemprop="description"><?= esc_html($sensibilisations_text) ?></p>
                        </a>

                    <?php endwhile; else: ?>
                    <p><?php _e('Sorry, no posts matched your criteria.') ?></p>
                <?php endif;
                wp_reset_postdata(); ?>
            </div>
        </section>
    </main>
<?php get_footer(); ?>