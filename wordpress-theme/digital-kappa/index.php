<?php
/**
 * Main template file
 *
 * @package Digital_Kappa
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php if (have_posts()) : ?>

        <div class="container-dk py-12">
            <div class="grid-dk grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>

            <?php the_posts_navigation(); ?>
        </div>

    <?php else : ?>

        <?php get_template_part('template-parts/content', 'none'); ?>

    <?php endif; ?>
</main><!-- #main -->

<?php
get_footer();
