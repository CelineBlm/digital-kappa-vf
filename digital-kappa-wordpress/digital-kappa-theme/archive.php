<?php
/**
 * The template for displaying archive pages
 *
 * @package Digital_Kappa_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php if (have_posts()) : ?>
        <header class="page-header" style="padding: 40px 20px; background: #f9fafb;">
            <div class="container-dk">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </div>
        </header>

        <div class="container-dk" style="padding: 40px 20px;">
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
        </div>
        <?php
    else :
        ?>
        <p style="padding: 40px; text-align: center;"><?php esc_html_e('Aucun contenu trouvé.', 'digital-kappa'); ?></p>
        <?php
    endif;
    ?>
</main>

<?php
get_footer();
