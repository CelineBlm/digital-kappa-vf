    </div><!-- #content -->

    <footer id="colophon" class="site-footer bg-[#1a1a1a] text-gray-400 py-12 px-4 lg:px-20">
        <div class="max-w-7xl mx-auto">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                <!-- Logo & Description -->
                <div class="footer-about">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 mb-4">
                        <div class="h-8 w-12 relative overflow-hidden">
                            <img
                                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo-digital-kappa-white.svg'); ?>"
                                alt="Digital Kappa"
                                class="h-8 w-auto"
                            >
                        </div>
                        <span class="text-xl font-bold text-white font-['Montserrat',sans-serif]">Digital Kappa</span>
                    </a>
                    <p class="text-sm text-gray-400 font-['Montserrat',sans-serif]">
                        Votre marketplace de produits digitaux premium
                    </p>
                </div>

                <!-- Catégories -->
                <div class="footer-categories">
                    <h4 class="text-white mb-4 font-['Merriweather',serif]">Catégories</h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="<?php echo esc_url(home_url('/categorie-produit/application')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">
                                Applications
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/categorie-produit/ebook')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">
                                Ebooks
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/categorie-produit/template')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">
                                Templates
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Légal -->
                <div class="footer-legal">
                    <h4 class="text-white mb-4 font-['Merriweather',serif]">Légal</h4>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="<?php echo esc_url(home_url('/a-propos')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">
                                À propos
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/cgv')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">
                                Conditions générales de vente
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo esc_url(home_url('/politique-confidentialite')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors font-['Montserrat',sans-serif]">
                                Politique de confidentialité
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="border-t border-gray-700 pt-8 text-center text-sm">
                <p class="text-gray-400 font-['Montserrat',sans-serif]">
                    &copy; <?php echo date('Y'); ?> Digital Kappa. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
