<?php
/**
 * The template for displaying all pages
 *
 * @package Digital_Kappa
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if (!is_front_page()) : ?>
            <header class="entry-header bg-dk-light py-12 lg:py-16 px-4 lg:px-20">
                <div class="max-w-4xl mx-auto text-center">
                    <?php the_title('<h1 class="entry-title text-dk-text-primary">', '</h1>'); ?>
                </div>
            </header>
            <?php endif; ?>

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'digital-kappa'),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
        <?php
    endwhile;
    ?>
</main><!-- #main -->

<?php
get_footer();
