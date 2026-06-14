<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Laurine Malchair">
    <meta name="description" content="Site du plai, un site institutionnel qui permet d'aider les professeur">
    <meta name="keywords" content="plai, pôle teritorial, liège">
    <title><?= get_the_title() ?> - PLAI</title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
</head>
<body>

<h1 class="sro"><?= get_the_title() ?></h1>

<nav class="navigation"> <!-- Navigation homemade -->
    <h2 class="navigation__title sro">Menu de navigation custom</h2>

    <div class="navigation__container">
        <a class="navigation__logo" href="<?= home_url('/') ?>">
            <img src="<?= get_template_directory_uri() ?>/assets/images/LOGO-PLAI.svg" alt="PLAI">
        </a>

        <button class="navigation__burger" aria-label="Ouvrir le menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <ul class="navigation__list">
            <?php foreach (dw_get_navigation_links('header') as $link) : ?>
                <li class="navigation__list-item">
                    <a class="navigation__link" href="<?= $link->href ?>"><?= $link->label ?></a>
                </li>
            <?php endforeach; ?>


        </ul>
    </div>
</nav>

