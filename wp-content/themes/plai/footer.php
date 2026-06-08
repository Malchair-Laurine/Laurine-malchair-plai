<footer class="footer">
    <div class="footer__container">

        <div class="footer__top">
            <div class="footer-brand">
                <a class="footer__logo" href="<?= home_url('/') ?>">
                    <img src="<?= get_template_directory_uri() ?>/assets/images/LOGO-PLAI.svg" alt="PLAI">
                </a>
                <p class="footer__description">
                    Le pôle liégeois d'accompagnement pour une école inclusive là pour vous aidez et vous accompagner
                </p>
            </div>

            <div class="footer__info-contact">
                <h3 class="footer__info-title"> Besoin d'agir ou d'en savoir plus ? </h3>
                <p class="footer__info-text">
                    Pour toute question, demande d'information complémentaire ou pour agir au sein de votre établissement, n'hésitez pas à <strong>contacter la direction</strong> ou <strong>votre référent</strong>.
                </p>
            </div>

            <nav class="navigation-footer"> <!-- Navigation homemade -->
                <h2 class="navigation-footer__title sro">Menu de navigation secondaire</h2>


                <ul class="navigation-footer__list">
                    <?php foreach (dw_get_navigation_links('footer') as $link) : ?>
                        <li class="navigation-footer__item">
                            <a class="navigation-footer__link" href="<?= $link->href ?>"><?= $link->label ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>

        <div class="footer__bottom">

            <p class="footer__copyright">
                <strong>©2026</strong> Site internet réalisé par HEPL
            </p>
        </div>
    </div>
</footer>
</body>
</html>
