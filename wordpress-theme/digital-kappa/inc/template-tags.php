<?php
/**
 * Template Tags
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Display posted on date
 */
function digital_kappa_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    printf(
        '<span class="posted-on">%s</span>',
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );
}

/**
 * Display posted by author
 */
function digital_kappa_posted_by() {
    printf(
        '<span class="byline">%s <span class="author vcard"><a class="url fn n" href="%s">%s</a></span></span>',
        esc_html__('Par', 'digital-kappa'),
        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
        esc_html(get_the_author())
    );
}

/**
 * Display entry footer
 */
function digital_kappa_entry_footer() {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list(esc_html__(', ', 'digital-kappa'));
        if ($categories_list) {
            printf(
                '<span class="cat-links">%s %s</span>',
                esc_html__('Catégories:', 'digital-kappa'),
                $categories_list
            );
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list('', esc_html__(', ', 'digital-kappa'));
        if ($tags_list) {
            printf(
                '<span class="tags-links">%s %s</span>',
                esc_html__('Tags:', 'digital-kappa'),
                $tags_list
            );
        }
    }

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: post title */
                    __('Laisser un commentaire<span class="screen-reader-text"> sur %s</span>', 'digital-kappa'),
                    array('span' => array('class' => array()))
                ),
                wp_kses_post(get_the_title())
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Modifier <span class="screen-reader-text">%s</span>', 'digital-kappa'),
                array('span' => array('class' => array()))
            ),
            wp_kses_post(get_the_title())
        ),
        '<span class="edit-link">',
        '</span>'
    );
}

/**
 * Display post thumbnail
 */
function digital_kappa_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }

    if (is_singular()) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail('large', array('class' => 'w-full h-auto rounded-lg')); ?>
        </div>
    <?php else : ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail(
                'medium_large',
                array(
                    'alt' => the_title_attribute(array('echo' => false)),
                    'class' => 'w-full h-full object-cover',
                )
            );
            ?>
        </a>
    <?php endif;
}

/**
 * Check if WooCommerce is active
 */
function digital_kappa_is_woocommerce_active() {
    return class_exists('WooCommerce');
}

/**
 * Get site logo or fallback
 */
function digital_kappa_get_logo() {
    if (has_custom_logo()) {
        return get_custom_logo();
    }

    return '<a href="' . esc_url(home_url('/')) . '" class="flex items-center gap-3">
        <div class="logo-icon flex h-8 w-8 items-center justify-center rounded-lg bg-dk-gold">
            <span class="text-lg font-bold text-white">DK</span>
        </div>
        <span class="font-body text-dk-text-primary">' . get_bloginfo('name') . '</span>
    </a>';
}

/**
 * Social share buttons
 */
function digital_kappa_share_buttons() {
    $permalink = esc_url(get_permalink());
    $title = esc_attr(get_the_title());

    $output = '<div class="share-buttons flex items-center gap-3">';
    $output .= '<span class="text-sm text-dk-text-secondary">' . esc_html__('Partager:', 'digital-kappa') . '</span>';

    // Facebook
    $output .= '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $permalink . '" target="_blank" rel="noopener" class="w-8 h-8 flex items-center justify-center rounded-full bg-dk-light hover:bg-dk-gold hover:text-white transition-colors">';
    $output .= '<i data-lucide="facebook" class="w-4 h-4"></i>';
    $output .= '</a>';

    // Twitter
    $output .= '<a href="https://twitter.com/intent/tweet?url=' . $permalink . '&text=' . $title . '" target="_blank" rel="noopener" class="w-8 h-8 flex items-center justify-center rounded-full bg-dk-light hover:bg-dk-gold hover:text-white transition-colors">';
    $output .= '<i data-lucide="twitter" class="w-4 h-4"></i>';
    $output .= '</a>';

    // LinkedIn
    $output .= '<a href="https://www.linkedin.com/shareArticle?mini=true&url=' . $permalink . '&title=' . $title . '" target="_blank" rel="noopener" class="w-8 h-8 flex items-center justify-center rounded-full bg-dk-light hover:bg-dk-gold hover:text-white transition-colors">';
    $output .= '<i data-lucide="linkedin" class="w-4 h-4"></i>';
    $output .= '</a>';

    // Copy link
    $output .= '<button onclick="navigator.clipboard.writeText(\'' . $permalink . '\')" class="w-8 h-8 flex items-center justify-center rounded-full bg-dk-light hover:bg-dk-gold hover:text-white transition-colors">';
    $output .= '<i data-lucide="link" class="w-4 h-4"></i>';
    $output .= '</button>';

    $output .= '</div>';

    return $output;
}

/**
 * Get formatted price
 */
function digital_kappa_format_price($price) {
    if (is_numeric($price)) {
        return number_format($price, 0, ',', ' ') . ' €';
    }
    return $price;
}

/**
 * Get guarantees list
 */
function digital_kappa_get_guarantees() {
    return array(
        array(
            'icon'  => 'download',
            'title' => __('Téléchargements illimités', 'digital-kappa'),
        ),
        array(
            'icon'  => 'refresh-cw',
            'title' => __('Mises à jour gratuites', 'digital-kappa'),
        ),
        array(
            'icon'  => 'headphones',
            'title' => __('Support technique inclus', 'digital-kappa'),
        ),
        array(
            'icon'  => 'shield-check',
            'title' => __('Satisfait ou remboursé 14 jours', 'digital-kappa'),
        ),
    );
}
