<?php
/**
 * Template Functions
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Desktop Menu Walker
 */
class Digital_Kappa_Desktop_Menu_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu bg-white shadow-lg rounded-lg border border-gray-100 py-2 min-w-[200px] absolute top-full left-0 hidden group-hover:block\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if ($depth === 0) {
            $classes[] = 'group relative';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        if ($depth === 0) {
            $atts['class'] = 'flex items-center gap-1.5 py-3 text-sm font-medium text-dk-text-primary hover:text-dk-gold transition-colors border-b-2 border-transparent hover:border-dk-gold';
        } else {
            $atts['class'] = 'block px-4 py-2 text-sm text-dk-text-primary hover:text-dk-gold hover:bg-dk-light transition-colors';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . $title . ($args->link_after ?? '');

        // Add chevron icon for items with children
        if (in_array('menu-item-has-children', $classes)) {
            $item_output .= '<i data-lucide="chevron-down" class="w-4 h-4"></i>';
        }

        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Mobile Menu Walker
 */
class Digital_Kappa_Mobile_Menu_Walker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu pl-4 border-l-2 border-dk-gold mt-2\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        $atts['class']  = 'flex items-center justify-between py-3 px-4 text-dk-text-primary hover:text-dk-gold hover:bg-dk-light rounded-lg transition-colors';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . $title . ($args->link_after ?? '');
        $item_output .= '<i data-lucide="chevron-right" class="w-5 h-5"></i>';
        $item_output .= '</a>';
        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Fallback menu if no menu is assigned
 */
function digital_kappa_fallback_menu() {
    echo '<ul class="primary-menu flex gap-8">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Accueil', 'digital-kappa') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/produits')) . '">' . esc_html__('Tous nos produits', 'digital-kappa') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/comment-ca-marche')) . '">' . esc_html__('Comment ça marche', 'digital-kappa') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/faq')) . '">' . esc_html__('FAQ', 'digital-kappa') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/a-propos')) . '">' . esc_html__('À propos', 'digital-kappa') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">' . esc_html__('Contact', 'digital-kappa') . '</a></li>';
    echo '</ul>';
}

/**
 * Get product rating stars HTML
 */
function digital_kappa_get_rating_stars($rating = 5, $max = 5) {
    $output = '<div class="flex items-center gap-1">';

    for ($i = 1; $i <= $max; $i++) {
        if ($i <= floor($rating)) {
            $output .= '<svg class="w-4 h-4 text-dk-gold fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
        } elseif ($i - $rating < 1 && $i - $rating > 0) {
            $output .= '<svg class="w-4 h-4 text-dk-gold fill-current" viewBox="0 0 20 20"><defs><linearGradient id="half"><stop offset="50%" stop-color="currentColor"/><stop offset="50%" stop-color="#e5e7eb"/></linearGradient></defs><path fill="url(#half)" d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
        } else {
            $output .= '<svg class="w-4 h-4 text-gray-200 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>';
        }
    }

    $output .= '</div>';

    return $output;
}

/**
 * Get product card HTML
 */
function digital_kappa_product_card($product_id) {
    $title = get_the_title($product_id);
    $excerpt = get_the_excerpt($product_id);
    $image = get_the_post_thumbnail_url($product_id, 'medium_large');
    $permalink = get_permalink($product_id);
    $price = get_post_meta($product_id, '_dk_price', true);
    $rating = get_post_meta($product_id, '_dk_rating', true) ?: 4.5;

    $terms = get_the_terms($product_id, 'dk_product_category');
    $category = $terms ? $terms[0]->name : '';

    ob_start();
    ?>
    <article class="product-card">
        <a href="<?php echo esc_url($permalink); ?>" class="product-card-image">
            <?php if ($image) : ?>
                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
            <?php else : ?>
                <div class="aspect-[4/3] bg-dk-bg-gray flex items-center justify-center">
                    <i data-lucide="image" class="w-12 h-12 text-gray-300"></i>
                </div>
            <?php endif; ?>
            <?php if ($category) : ?>
                <span class="product-card-badge"><?php echo esc_html($category); ?></span>
            <?php endif; ?>
        </a>

        <div class="product-card-content">
            <h3 class="product-card-title">
                <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
            </h3>

            <p class="product-card-description"><?php echo esc_html($excerpt); ?></p>

            <div class="product-card-rating">
                <?php echo digital_kappa_get_rating_stars($rating); ?>
                <span>(<?php echo esc_html($rating); ?>)</span>
            </div>

            <div class="product-card-footer">
                <span class="product-card-price"><?php echo esc_html($price); ?></span>
                <a href="<?php echo esc_url($permalink); ?>" class="product-card-button">
                    <?php esc_html_e('Voir', 'digital-kappa'); ?>
                </a>
            </div>
        </div>
    </article>
    <?php
    return ob_get_clean();
}

/**
 * Breadcrumbs
 */
function digital_kappa_breadcrumbs() {
    if (is_front_page()) {
        return;
    }

    $separator = '<i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>';

    echo '<nav class="breadcrumbs py-4" aria-label="Breadcrumb">';
    echo '<ol class="flex items-center gap-2 text-sm">';
    echo '<li><a href="' . esc_url(home_url('/')) . '" class="text-gray-500 hover:text-dk-gold">' . esc_html__('Accueil', 'digital-kappa') . '</a></li>';
    echo '<li>' . $separator . '</li>';

    if (is_category() || is_single()) {
        $categories = get_the_category();
        if ($categories) {
            echo '<li><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="text-gray-500 hover:text-dk-gold">' . esc_html($categories[0]->name) . '</a></li>';
            echo '<li>' . $separator . '</li>';
        }
    }

    if (is_single() || is_page()) {
        echo '<li class="text-dk-text-primary font-medium">' . esc_html(get_the_title()) . '</li>';
    } elseif (is_category()) {
        echo '<li class="text-dk-text-primary font-medium">' . esc_html(single_cat_title('', false)) . '</li>';
    } elseif (is_archive()) {
        echo '<li class="text-dk-text-primary font-medium">' . esc_html(get_the_archive_title()) . '</li>';
    } elseif (is_search()) {
        echo '<li class="text-dk-text-primary font-medium">' . esc_html__('Recherche', 'digital-kappa') . '</li>';
    }

    echo '</ol>';
    echo '</nav>';
}

/**
 * Custom excerpt length
 */
function digital_kappa_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'digital_kappa_excerpt_length');

/**
 * Custom excerpt more
 */
function digital_kappa_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'digital_kappa_excerpt_more');
