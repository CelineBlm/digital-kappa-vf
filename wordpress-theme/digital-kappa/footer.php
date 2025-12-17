    </div><!-- #content -->

    <footer id="colophon" class="site-footer bg-dk-dark-alt">
        <div class="footer-container px-4 lg:px-20 py-12">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
                    <!-- Logo & Description -->
                    <div class="footer-about">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 mb-4">
                            <div class="w-8 h-8 bg-dk-gold rounded flex items-center justify-center">
                                <span class="text-white font-bold text-sm">DK</span>
                            </div>
                            <span class="text-white font-body"><?php bloginfo('name'); ?></span>
                        </a>
                        <p class="text-sm text-gray-400">
                            <?php echo esc_html(get_theme_mod('dk_footer_text', __('Votre marketplace de produits digitaux premium', 'digital-kappa'))); ?>
                        </p>
                    </div>

                    <!-- Footer Widget Area 1 -->
                    <div class="footer-widget-1">
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <?php dynamic_sidebar('footer-1'); ?>
                        <?php else : ?>
                            <h4 class="text-white mb-4 font-body"><?php esc_html_e('Pages', 'digital-kappa'); ?></h4>
                            <ul class="space-y-2 text-sm text-gray-400">
                                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Accueil', 'digital-kappa'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/produits')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Produits', 'digital-kappa'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/comment-ca-marche')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Comment ça marche', 'digital-kappa'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/faq')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('FAQ', 'digital-kappa'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Widget Area 2 -->
                    <div class="footer-widget-2">
                        <?php if (is_active_sidebar('footer-2')) : ?>
                            <?php dynamic_sidebar('footer-2'); ?>
                        <?php else : ?>
                            <h4 class="text-white mb-4 font-body"><?php esc_html_e('Catégories', 'digital-kappa'); ?></h4>
                            <ul class="space-y-2 text-sm text-gray-400">
                                <li><a href="<?php echo esc_url(home_url('/categorie-produit/ebook')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Ebooks', 'digital-kappa'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/categorie-produit/application')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Applications', 'digital-kappa'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/categorie-produit/template')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Templates', 'digital-kappa'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Footer Widget Area 3 -->
                    <div class="footer-widget-3">
                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <?php dynamic_sidebar('footer-3'); ?>
                        <?php else : ?>
                            <h4 class="text-white mb-4 font-body"><?php esc_html_e('Légal', 'digital-kappa'); ?></h4>
                            <ul class="space-y-2 text-sm text-gray-400">
                                <li><a href="<?php echo esc_url(home_url('/cgv')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Conditions générales', 'digital-kappa'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/politique-confidentialite')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Politique de confidentialité', 'digital-kappa'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/mentions-legales')); ?>" class="hover:text-dk-gold transition-colors"><?php esc_html_e('Mentions légales', 'digital-kappa'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="border-t border-gray-700 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-sm">
                    <p class="text-gray-400">
                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Tous droits réservés.', 'digital-kappa'); ?>
                    </p>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu flex gap-6 text-gray-400',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
</script>

</body>
</html>
