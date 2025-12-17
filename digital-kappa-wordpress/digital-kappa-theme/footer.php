    </div><!-- #content -->

    <?php
    // Let Elementor handle footer if using Theme Builder
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('footer')) :
    ?>
    <footer id="colophon" class="footer-dk">
        <div class="container-dk">
            <div class="footer-logo-section">
                <div class="footer-logo">
                    <span class="footer-logo-text"><?php bloginfo('name'); ?></span>
                </div>
                <p class="footer-description">
                    <?php bloginfo('description'); ?>
                </p>
            </div>

            <?php if (has_nav_menu('footer')) : ?>
            <div class="footer-column">
                <h4><?php esc_html_e('Liens utiles', 'digital-kappa'); ?></h4>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_id' => 'footer-menu',
                    'fallback_cb' => false,
                ));
                ?>
            </div>
            <?php endif; ?>

            <?php if (has_nav_menu('legal')) : ?>
            <div class="footer-column">
                <h4><?php esc_html_e('Légal', 'digital-kappa'); ?></h4>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'legal',
                    'menu_id' => 'legal-menu',
                    'fallback_cb' => false,
                ));
                ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Tous droits réservés.', 'digital-kappa'); ?></p>
        </div>
    </footer>
    <?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
