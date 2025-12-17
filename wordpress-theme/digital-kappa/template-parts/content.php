<?php
/**
 * Template part for displaying posts
 *
 * @package Digital_Kappa
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('product-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="product-card-image">
            <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover')); ?>
        </a>
    <?php else : ?>
        <a href="<?php the_permalink(); ?>" class="product-card-image aspect-[4/3] bg-dk-bg-gray flex items-center justify-center">
            <i data-lucide="image" class="w-12 h-12 text-gray-300"></i>
        </a>
    <?php endif; ?>

    <div class="product-card-content">
        <header class="entry-header">
            <?php the_title('<h3 class="product-card-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>
        </header>

        <div class="entry-summary">
            <p class="product-card-description"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
        </div>

        <footer class="entry-footer product-card-footer">
            <a href="<?php the_permalink(); ?>" class="product-card-button">
                <?php esc_html_e('Lire la suite', 'digital-kappa'); ?>
            </a>
        </footer>
    </div>
</article>
