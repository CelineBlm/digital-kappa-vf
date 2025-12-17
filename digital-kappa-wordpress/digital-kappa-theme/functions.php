<?php
/**
 * Digital Kappa Theme Functions
 *
 * @package Digital_Kappa
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('DK_THEME_VERSION', '1.0.0');
define('DK_THEME_DIR', get_template_directory());
define('DK_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function digital_kappa_setup() {
    // Support for featured images
    add_theme_support('post-thumbnails');

    // Title tag support
    add_theme_support('title-tag');

    // HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register navigation menus
    register_nav_menus(array(
        'header-menu' => __('Menu Header', 'digital-kappa'),
        'footer-categories' => __('Menu Footer Catégories', 'digital-kappa'),
        'footer-legal' => __('Menu Footer Légal', 'digital-kappa'),
    ));
}
add_action('after_setup_theme', 'digital_kappa_setup');

/**
 * Enqueue Styles and Scripts
 */
function digital_kappa_enqueue_assets() {
    // Google Fonts - Montserrat + Merriweather
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&family=Montserrat:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Tailwind CSS via CDN
    wp_enqueue_style(
        'tailwindcss',
        'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css',
        array(),
        '3.4.0'
    );

    // Main styles (copy of globals.css)
    wp_enqueue_style(
        'digital-kappa-styles',
        DK_THEME_URI . '/assets/css/digital-kappa-styles.css',
        array('tailwindcss'),
        DK_THEME_VERSION
    );

    // Component styles
    wp_enqueue_style('dk-header', DK_THEME_URI . '/assets/css/components/header.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-footer', DK_THEME_URI . '/assets/css/components/footer.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-product-card', DK_THEME_URI . '/assets/css/components/product-card.css', array('digital-kappa-styles'), DK_THEME_VERSION);

    // Page styles
    wp_enqueue_style('dk-homepage', DK_THEME_URI . '/assets/css/pages/homepage.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-all-products', DK_THEME_URI . '/assets/css/pages/all-products.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-product-detail', DK_THEME_URI . '/assets/css/pages/product-detail.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-checkout', DK_THEME_URI . '/assets/css/pages/checkout.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-order-confirmation', DK_THEME_URI . '/assets/css/pages/order-confirmation.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-how-it-works', DK_THEME_URI . '/assets/css/pages/how-it-works.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-faq', DK_THEME_URI . '/assets/css/pages/faq.css', array('digital-kappa-styles'), DK_THEME_VERSION);
    wp_enqueue_style('dk-legal-pages', DK_THEME_URI . '/assets/css/pages/legal-pages.css', array('digital-kappa-styles'), DK_THEME_VERSION);

    // Custom scripts
    wp_enqueue_script(
        'digital-kappa-scripts',
        DK_THEME_URI . '/assets/js/custom-scripts.js',
        array('jquery'),
        DK_THEME_VERSION,
        true
    );

    // Search autocomplete
    wp_enqueue_script(
        'dk-search-autocomplete',
        DK_THEME_URI . '/assets/js/search-autocomplete.js',
        array('jquery'),
        DK_THEME_VERSION,
        true
    );

    // Localize script for AJAX
    wp_localize_script('dk-search-autocomplete', 'dk_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('dk_search_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'digital_kappa_enqueue_assets');

/**
 * Include theme setup files
 */
require_once DK_THEME_DIR . '/inc/theme-setup.php';
require_once DK_THEME_DIR . '/inc/elementor-setup.php';
require_once DK_THEME_DIR . '/inc/woocommerce-config.php';

/**
 * AJAX Search Products Handler
 */
function dk_ajax_search_products() {
    check_ajax_referer('dk_search_nonce', 'security');

    $search_term = sanitize_text_field($_POST['search']);

    if (strlen($search_term) < 2) {
        wp_send_json_error('Search term too short');
    }

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        's' => $search_term,
        'posts_per_page' => 5,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $html = '<div class="search-results-list">';

        while ($query->have_posts()) {
            $query->the_post();
            global $product;

            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
            $image_url = $image ? $image[0] : wc_placeholder_img_src('thumbnail');

            $html .= '<a href="' . get_permalink() . '" class="search-result-item flex items-center gap-4 p-4 hover:bg-gray-50 transition-colors">';
            $html .= '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '" class="w-12 h-12 object-cover rounded-lg">';
            $html .= '<div class="flex-1">';
            $html .= '<p class="font-medium text-[#1a1a1a]">' . esc_html(get_the_title()) . '</p>';
            $html .= '<p class="text-[#d2a30b] font-medium">' . $product->get_price_html() . '</p>';
            $html .= '</div>';
            $html .= '</a>';
        }

        $html .= '</div>';

        wp_reset_postdata();
        wp_send_json_success($html);
    } else {
        wp_send_json_success('<p class="p-4 text-sm text-gray-500">Aucun produit trouvé</p>');
    }
}
add_action('wp_ajax_dk_search_products', 'dk_ajax_search_products');
add_action('wp_ajax_nopriv_dk_search_products', 'dk_ajax_search_products');

/**
 * Remove default WooCommerce styles
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add body classes
 */
function dk_body_classes($classes) {
    $classes[] = 'dk-theme';

    if (is_front_page()) {
        $classes[] = 'dk-home';
    }

    if (is_woocommerce()) {
        $classes[] = 'dk-woocommerce';
    }

    return $classes;
}
add_filter('body_class', 'dk_body_classes');
