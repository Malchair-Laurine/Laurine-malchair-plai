<?php
/* Template Name: HomePage */
?>
<?php get_header(); ?>

<?php
$is_falc = isset($_GET['Falc']) ? true : false;

// 2. Initialisation par défaut de toutes les variables (évite les notices PHP)
$main_title = $span = $main_description = '';
$description_cards = [];
$mission_title = $mission_subtitle = $mission_text = '';
$mission_cards = [];

// 3. Récupération des données selon le mode (Normal ou FALC)
if ($is_falc) {
    $main_title         = get_field('main_title_falc');
    $span               = get_field('span_falc');
    $main_description   = get_field('main_description_falc');
    $description_cards  = get_field('description_cards_falc') ?: [];

    $mission_title      = get_field('mission_title_falc');
    $mission_text       = get_field('mission_text_falc');
    $mission_cards      = get_field('mission_cards_falc') ?: [];}
else {
    $main_title         = get_field('main_title');
    $span               = get_field('span');
    $main_description   = get_field('main_description');
    $description_cards  = get_field('description_cards') ?: [];

    $mission_title      = get_field('mission_title');
    $mission_subtitle   = get_field('mission_subtitle');
    $mission_text       = get_field('mission_text');
    $mission_cards      = get_field('mission_cards') ?: [];
}

// On adapte une classe CSS sur le body/wrapper pour le style FALC si besoin
$body_class = $is_falc ? 'home-falc' : 'home-normal';
?>

    <main class="<?= $body_class ?>">

        <header class="home-header">
            <?php if (!empty($main_title)) : ?>
                <h1 class="home-header__title"><?= esc_html($main_title) ?> <span><?= esc_html($span) ?></span></h1>
            <?php endif; ?>

            <?php if (!empty($main_description)): ?>
                <div class="home-header__description"><?= wp_kses_post($main_description) ?></div>
            <?php endif; ?>

            <?php if (!empty($description_cards)) : ?>
                <div class="home-header__cards">
                    <?php foreach ($description_cards as $card) :
                        // On gère dynamiquement la clé ACF qui change entre FALC et normal
                        $card_text = $is_falc ? ($card['card_text_falc'] ?? '') : ($card['card_text'] ?? '');
                        ?>
                        <div class="home-header__card">
                            <p class="home-header__card-text"><?= esc_html($card_text) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </header>

        <section class="missions">
            <div class="missions__intro-wrapper">
                <div class="missions__title-block">
                    <?php if (!$is_falc && !empty($mission_subtitle)) : ?>
                        <h3 class="missions__subtitle"><?= esc_html($mission_subtitle) ?></h3>
                    <?php endif; ?>

                    <?php if (!empty($mission_title)) : ?>
                        <h2 class="missions__title"><?= esc_html($mission_title) ?></h2>
                    <?php endif; ?>
                </div>

                <?php if (!empty($mission_text)) : ?>
                    <div class="missions__text"><?= wp_kses_post($mission_text) ?></div>
                <?php endif; ?>
            </div>

            <?php if (!empty($mission_cards)) : ?>
                <div class="missions__grid">
                    <?php foreach ($mission_cards as $card) :
                        // Gestion dynamique des clés ACF pour les cartes missions
                        $img   = $is_falc ? ($card['mission_icon_falc'] ?? null) : ($card['mission_icon'] ?? null);
                        $title = $is_falc ? ($card['mission_card_title_falc'] ?? '') : ($card['mission_card_title'] ?? '');
                        $text  = $is_falc ? ($card['mission_card_text_falc'] ?? '') : ($card['mission_card_text'] ?? '');
                        ?>
                        <div class="missions__card">
                            <?php if (!empty($img)) : ?>
                                <img src="<?= esc_url($img['url']) ?>"
                                     alt="<?= esc_attr($img['alt']) ?>"
                                     width="400"
                                     height="400"
                                     class="missions__card-icon">
                            <?php endif; ?>

                            <?php if (!empty($title)) : ?>
                                <h4 class="missions__card__title"><?= esc_html($title) ?></h4>
                            <?php endif; ?>

                            <?php if (!empty($text)) : ?>
                                <div class="missions__card__text"><?= wp_kses_post($text) ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

    </main>


<?php get_footer(); ?>