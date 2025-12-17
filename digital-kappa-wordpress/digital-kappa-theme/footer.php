    </div><!-- #content -->

    <?php
    // Let Elementor handle footer if using Theme Builder
    if (!function_exists('elementor_theme_do_location') || !elementor_theme_do_location('footer')) :
    ?>
    <footer id="colophon" class="footer-dk bg-[#1a1a1a] text-white py-12 lg:py-16 px-4 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-12">
                <!-- Logo & Tagline -->
                <div class="space-y-4">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-[#d2a30b] rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">K</span>
                        </div>
                        <span class="font-['Merriweather',serif] font-bold text-white text-lg">Digital Kappa</span>
                    </a>
                    <p class="text-gray-400 text-sm">Votre marketplace de produits digitaux premium</p>
                </div>

                <!-- Pages -->
                <div>
                    <h4 class="font-['Merriweather',serif] font-medium text-white mb-4">Pages</h4>
                    <ul class="space-y-2">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Accueil</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produits/')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Produits</a></li>
                        <li><a href="<?php echo esc_url(home_url('/blog/')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Blog</a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Contact</a></li>
                    </ul>
                </div>

                <!-- Catégories -->
                <div>
                    <h4 class="font-['Merriweather',serif] font-medium text-white mb-4">Catégories</h4>
                    <ul class="space-y-2">
                        <li><a href="<?php echo esc_url(home_url('/produits/?cat=applications')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Applications</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produits/?cat=ebooks')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Ebooks</a></li>
                        <li><a href="<?php echo esc_url(home_url('/produits/?cat=templates')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Templates</a></li>
                    </ul>
                </div>

                <!-- Légal -->
                <div>
                    <h4 class="font-['Merriweather',serif] font-medium text-white mb-4">Légal</h4>
                    <ul class="space-y-2">
                        <li><a href="<?php echo esc_url(home_url('/conditions-generales-de-vente/')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Conditions générales</a></li>
                        <li><a href="<?php echo esc_url(home_url('/politique-de-confidentialite/')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Politique de confidentialité</a></li>
                        <li><a href="<?php echo esc_url(home_url('/mentions-legales/')); ?>" class="text-gray-400 hover:text-[#d2a30b] transition-colors text-sm">Mentions légales</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="pt-8 border-t border-gray-800 text-center">
                <p class="text-gray-500 text-sm">&copy; <?php echo date('Y'); ?> Digital Kappa. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    <?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
