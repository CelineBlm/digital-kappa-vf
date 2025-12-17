<?php
/**
 * The template for displaying search results
 *
 * @package Digital_Kappa_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <header class="page-header" style="padding: 40px 20px; background: #f9fafb;">
        <div class="container-dk">
            <h1 class="page-title">
                <?php
                printf(
                    /* translators: %s: search query */
                    esc_html__('Résultats de recherche pour : %s', 'digital-kappa'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </div>
    </header>

    <div class="container-dk" style="padding: 40px 20px;">
        <?php if (have_posts()) : ?>
            <div class="products-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card-dk-product'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="product-image-container">
                                <?php the_post_thumbnail('medium_large', array('class' => 'product-image')); ?>
                            </div>
                        <?php endif; ?>
                        <div class="product-content">
                            <?php the_title('<h3 class="product-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>
                            <div class="product-description">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php the_posts_navigation(); ?>
        <?php else : ?>
            <p style="text-align: center;"><?php esc_html_e('Aucun résultat trouvé. Essayez avec d\'autres termes de recherche.', 'digital-kappa'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
