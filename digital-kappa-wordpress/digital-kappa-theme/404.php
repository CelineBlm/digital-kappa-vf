<?php
/**
 * The template for displaying 404 pages
 *
 * @package Digital_Kappa_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found" style="padding: 80px 20px; text-align: center;">
        <header class="page-header">
            <h1 class="page-title" style="font-size: 4rem; color: #d2a30b; margin-bottom: 1rem;">404</h1>
        </header>

        <div class="page-content">
            <h2 style="margin-bottom: 1rem;"><?php esc_html_e('Page non trouvée', 'digital-kappa'); ?></h2>
            <p style="color: #4a5565; margin-bottom: 2rem;">
                <?php esc_html_e('La page que vous recherchez n\'existe pas ou a été déplacée.', 'digital-kappa'); ?>
            </p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-dk-primary">
                <?php esc_html_e('Retour à l\'accueil', 'digital-kappa'); ?>
            </a>
        </div>
    </section>
</main>

<?php
get_footer();
