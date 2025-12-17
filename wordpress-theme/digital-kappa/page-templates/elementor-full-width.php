<?php
/**
 * Template Name: Elementor Full Width
 *
 * @package Digital_Kappa
 */

get_header();
?>

<main id="primary" class="site-main elementor-full-width">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php
get_footer();
