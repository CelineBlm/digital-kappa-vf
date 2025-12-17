<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Digital_Kappa
 */
?>

<section class="no-results not-found py-20 px-4 lg:px-20">
    <div class="max-w-2xl mx-auto text-center">
        <div class="w-20 h-20 bg-dk-gold/10 rounded-full flex items-center justify-center mx-auto mb-6">
            <i data-lucide="search-x" class="w-10 h-10 text-dk-gold"></i>
        </div>

        <header class="page-header mb-6">
            <h1 class="page-title text-dk-text-primary">
                <?php esc_html_e('Aucun résultat', 'digital-kappa'); ?>
            </h1>
        </header>

        <div class="page-content">
            <?php if (is_search()) : ?>
                <p class="text-dk-text-muted mb-8">
                    <?php esc_html_e('Désolé, aucun résultat ne correspond à votre recherche. Essayez avec d\'autres termes.', 'digital-kappa'); ?>
                </p>
                <form role="search" method="get" class="search-form max-w-md mx-auto" action="<?php echo esc_url(home_url('/')); ?>">
                    <div class="relative">
                        <input type="search" class="input-dk pr-12" placeholder="<?php esc_attr_e('Rechercher...', 'digital-kappa'); ?>" value="<?php echo get_search_query(); ?>" name="s">
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 p-2 text-dk-gold">
                            <i data-lucide="search" class="w-5 h-5"></i>
                        </button>
                    </div>
                </form>
            <?php else : ?>
                <p class="text-dk-text-muted mb-8">
                    <?php esc_html_e('Il semble qu\'il n\'y ait pas encore de contenu ici. Revenez bientôt !', 'digital-kappa'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-dk-primary">
                    <?php esc_html_e('Retour à l\'accueil', 'digital-kappa'); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
