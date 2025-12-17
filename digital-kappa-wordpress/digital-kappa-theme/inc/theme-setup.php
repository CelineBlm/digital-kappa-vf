<?php
/**
 * Digital Kappa Theme Setup Functions
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Widget Areas
 */
function dk_register_widgets() {
    register_sidebar(array(
        'name'          => __('Sidebar Shop', 'digital-kappa'),
        'id'            => 'sidebar-shop',
        'description'   => __('Sidebar pour les pages WooCommerce', 'digital-kappa'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'digital-kappa'),
        'id'            => 'footer-1',
        'description'   => __('Zone de widget Footer 1', 'digital-kappa'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'digital-kappa'),
        'id'            => 'footer-2',
        'description'   => __('Zone de widget Footer 2', 'digital-kappa'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'digital-kappa'),
        'id'            => 'footer-3',
        'description'   => __('Zone de widget Footer 3', 'digital-kappa'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'dk_register_widgets');

/**
 * Set Content Width
 */
function dk_content_width() {
    $GLOBALS['content_width'] = apply_filters('dk_content_width', 1280);
}
add_action('after_setup_theme', 'dk_content_width', 0);

/**
 * Add custom image sizes
 */
function dk_add_image_sizes() {
    add_image_size('dk-product-card', 400, 300, true);
    add_image_size('dk-product-thumbnail', 80, 80, true);
    add_image_size('dk-hero-image', 800, 600, true);
    add_image_size('dk-testimonial', 100, 100, true);
}
add_action('after_setup_theme', 'dk_add_image_sizes');

/**
 * Make custom image sizes selectable in media library
 */
function dk_custom_image_sizes($sizes) {
    return array_merge($sizes, array(
        'dk-product-card' => __('Product Card (400x300)', 'digital-kappa'),
        'dk-hero-image' => __('Hero Image (800x600)', 'digital-kappa'),
    ));
}
add_filter('image_size_names_choose', 'dk_custom_image_sizes');

/**
 * Customize login page logo
 */
function dk_login_logo() {
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

    if (has_custom_logo()) {
        ?>
        <style type="text/css">
            #login h1 a {
                background-image: url(<?php echo esc_url($logo[0]); ?>);
                background-size: contain;
                width: 100%;
                height: 80px;
            }
        </style>
        <?php
    }
}
add_action('login_enqueue_scripts', 'dk_login_logo');

/**
 * Customize login page URL
 */
function dk_login_url() {
    return home_url();
}
add_filter('login_headerurl', 'dk_login_url');

/**
 * Add SVG support
 */
function dk_svg_upload_support($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'dk_svg_upload_support');

/**
 * Fix SVG display in media library
 */
function dk_svg_meta_fix($data, $id) {
    $attachment = get_post($id);
    $mime_type = $attachment->post_mime_type;

    if ($mime_type == 'image/svg+xml') {
        if (empty($data) || empty($data['width']) || empty($data['height'])) {
            $data = array(
                'width' => 100,
                'height' => 100,
            );
        }
    }

    return $data;
}
add_filter('wp_update_attachment_metadata', 'dk_svg_meta_fix', 10, 2);

/**
 * Disable Gutenberg for pages using Elementor
 */
function dk_disable_gutenberg_for_elementor($use_block_editor, $post) {
    if ($post && get_post_meta($post->ID, '_elementor_edit_mode', true)) {
        return false;
    }
    return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'dk_disable_gutenberg_for_elementor', 10, 2);
