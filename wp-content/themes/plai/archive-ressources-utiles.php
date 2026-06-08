<?php get_header(); ?>

<?php
$terms = get_terms(['ressource-type']);
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$args = [
        'post_type' => 'ressources-utiles',
        'post_status' => 'publish',
        'posts_per_page' => 15,
];

if ($taxonomy !== '') {
    $args['tax_query'] = [
            [
                    'taxonomy' => 'ressource-type',
                    'field' => 'slug',
                    'terms' => $taxonomy,
            ]
    ];
}

$query = new WP_Query($args);
?>

<main class="ressources-container">
    <header class="ressources-header">
        <h1 class="ressources-header__title">Toutes nos ressources utiles</h1>
        <p class="ressources-header__description">Ici vous retrouverez des ressources utiles qui serviront a vous accompagné</p>
    </header>

    <nav class="ressources__nav">
        <ul class="ressources__filter-list">
            <?php foreach ($terms as $term) : ?>
                <li class="ressources__filter-item">
                    <a href="<?= get_post_type_archive_link('ressources-utiles') ?>?filter=<?= $term->slug ?>" class="ressources__filter-link">
                        <?= $term->name ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <section class="ressources-section">
        <div class="ressources-grid">
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $ressources_title = get_field('ressources_title', get_the_ID());
                $ressources_description = get_field('ressources_description', get_the_ID());
                ?>
                <a class="ressources-card" href="<?= get_the_permalink() ?>" title="<?= get_the_title() ?>">
                    <h3 class="ressources-card__title"><?= $ressources_title ?></h3>
                    <p class="ressources-card__description"><?= $ressources_description ?></p>
                </a>
            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.') ?></p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>