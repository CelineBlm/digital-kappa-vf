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

// Define theme constants
define('DIGITAL_KAPPA_VERSION', '1.0.0');
define('DIGITAL_KAPPA_DIR', get_template_directory());
define('DIGITAL_KAPPA_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function digital_kappa_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    // WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register navigation menus
    register_nav_menus(array(
        'primary'   => __('Menu Principal', 'digital-kappa'),
        'secondary' => __('Menu Secondaire', 'digital-kappa'),
        'footer'    => __('Menu Footer', 'digital-kappa'),
    ));

    // Load text domain
    load_theme_textdomain('digital-kappa', DIGITAL_KAPPA_DIR . '/languages');
}
add_action('after_setup_theme', 'digital_kappa_setup');

/**
 * Enqueue Scripts and Styles
 */
function digital_kappa_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'digital-kappa-google-fonts',
        'https://fonts.googleapis.com/css2?family=Merriweather:wght@400;500;700&family=Montserrat:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'digital-kappa-style',
        get_stylesheet_uri(),
        array(),
        DIGITAL_KAPPA_VERSION
    );

    // Additional CSS
    wp_enqueue_style(
        'digital-kappa-components',
        DIGITAL_KAPPA_URI . '/assets/css/components.css',
        array('digital-kappa-style'),
        DIGITAL_KAPPA_VERSION
    );

    // Lucide Icons
    wp_enqueue_script(
        'lucide-icons',
        'https://unpkg.com/lucide@latest/dist/umd/lucide.js',
        array(),
        null,
        true
    );

    // Main JavaScript
    wp_enqueue_script(
        'digital-kappa-main',
        DIGITAL_KAPPA_URI . '/assets/js/main.js',
        array('jquery'),
        DIGITAL_KAPPA_VERSION,
        true
    );

    // Localize script
    wp_localize_script('digital-kappa-main', 'digitalKappa', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('digital_kappa_nonce'),
        'homeUrl' => home_url(),
    ));
}
add_action('wp_enqueue_scripts', 'digital_kappa_scripts');

/**
 * Register Widget Areas
 */
function digital_kappa_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Produits', 'digital-kappa'),
        'id'            => 'sidebar-products',
        'description'   => __('Zone de widgets pour la page produits', 'digital-kappa'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Col 1', 'digital-kappa'),
        'id'            => 'footer-1',
        'description'   => __('Zone de widgets footer colonne 1', 'digital-kappa'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-white mb-4">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Col 2', 'digital-kappa'),
        'id'            => 'footer-2',
        'description'   => __('Zone de widgets footer colonne 2', 'digital-kappa'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-white mb-4">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Col 3', 'digital-kappa'),
        'id'            => 'footer-3',
        'description'   => __('Zone de widgets footer colonne 3', 'digital-kappa'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-white mb-4">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Col 4', 'digital-kappa'),
        'id'            => 'footer-4',
        'description'   => __('Zone de widgets footer colonne 4', 'digital-kappa'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-white mb-4">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'digital_kappa_widgets_init');

/**
 * Elementor Support
 */
function digital_kappa_elementor_support() {
    // Register Elementor locations
    if (did_action('elementor/loaded')) {
        add_action('elementor/theme/register_locations', 'digital_kappa_register_elementor_locations');
    }
}
add_action('init', 'digital_kappa_elementor_support');

function digital_kappa_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_all_core_location();
}

/**
 * Register Elementor Widgets
 */
function digital_kappa_register_elementor_widgets($widgets_manager) {
    // Include widget files
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-hero-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-value-propositions-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-products-grid-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-categories-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-testimonials-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-faq-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-cta-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-process-steps-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-stats-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-contact-form-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-product-filters-widget.php';
    require_once DIGITAL_KAPPA_DIR . '/elementor/widgets/class-about-section-widget.php';

    // Register widgets
    $widgets_manager->register(new \Digital_Kappa_Hero_Widget());
    $widgets_manager->register(new \Digital_Kappa_Value_Propositions_Widget());
    $widgets_manager->register(new \Digital_Kappa_Products_Grid_Widget());
    $widgets_manager->register(new \Digital_Kappa_Categories_Widget());
    $widgets_manager->register(new \Digital_Kappa_Testimonials_Widget());
    $widgets_manager->register(new \Digital_Kappa_FAQ_Widget());
    $widgets_manager->register(new \Digital_Kappa_CTA_Widget());
    $widgets_manager->register(new \Digital_Kappa_Process_Steps_Widget());
    $widgets_manager->register(new \Digital_Kappa_Stats_Widget());
    $widgets_manager->register(new \Digital_Kappa_Contact_Form_Widget());
    $widgets_manager->register(new \Digital_Kappa_Product_Filters_Widget());
    $widgets_manager->register(new \Digital_Kappa_About_Section_Widget());
}
add_action('elementor/widgets/register', 'digital_kappa_register_elementor_widgets');

/**
 * Register Elementor Widget Category
 */
function digital_kappa_elementor_category($elements_manager) {
    $elements_manager->add_category(
        'digital-kappa',
        [
            'title' => __('Digital Kappa', 'digital-kappa'),
            'icon'  => 'fa fa-plug',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'digital_kappa_elementor_category');

/**
 * Customizer Settings
 */
function digital_kappa_customize_register($wp_customize) {
    // Theme Options Section
    $wp_customize->add_section('digital_kappa_options', array(
        'title'    => __('Options Digital Kappa', 'digital-kappa'),
        'priority' => 30,
    ));

    // Gold Color
    $wp_customize->add_setting('dk_gold_color', array(
        'default'           => '#d2a30b',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dk_gold_color', array(
        'label'    => __('Couleur principale (Or)', 'digital-kappa'),
        'section'  => 'digital_kappa_options',
        'settings' => 'dk_gold_color',
    )));

    // Footer Text
    $wp_customize->add_setting('dk_footer_text', array(
        'default'           => __('Des ressources numériques simples et de qualité pour créateurs, entrepreneurs et passionnés.', 'digital-kappa'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('dk_footer_text', array(
        'label'    => __('Texte du footer', 'digital-kappa'),
        'section'  => 'digital_kappa_options',
        'type'     => 'textarea',
    ));

    // Contact Email
    $wp_customize->add_setting('dk_contact_email', array(
        'default'           => 'contact@digitalkappa.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('dk_contact_email', array(
        'label'    => __('Email de contact', 'digital-kappa'),
        'section'  => 'digital_kappa_options',
        'type'     => 'email',
    ));
}
add_action('customize_register', 'digital_kappa_customize_register');

/**
 * Custom CSS Variables from Customizer
 */
function digital_kappa_customizer_css() {
    $gold_color = get_theme_mod('dk_gold_color', '#d2a30b');
    ?>
    <style type="text/css">
        :root {
            --dk-gold: <?php echo esc_attr($gold_color); ?>;
            --dk-gold-hover: <?php echo esc_attr(digital_kappa_darken_color($gold_color, 10)); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'digital_kappa_customizer_css');

/**
 * Helper function to darken color
 */
function digital_kappa_darken_color($hex, $percent) {
    $hex = ltrim($hex, '#');

    if (strlen($hex) == 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }

    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));

    $r = max(0, min(255, $r - ($r * $percent / 100)));
    $g = max(0, min(255, $g - ($g * $percent / 100)));
    $b = max(0, min(255, $b - ($b * $percent / 100)));

    return sprintf('#%02x%02x%02x', $r, $g, $b);
}

/**
 * Custom Post Type for Products (if not using WooCommerce)
 */
function digital_kappa_register_post_types() {
    register_post_type('dk_product', array(
        'labels'             => array(
            'name'               => __('Produits', 'digital-kappa'),
            'singular_name'      => __('Produit', 'digital-kappa'),
            'menu_name'          => __('Produits DK', 'digital-kappa'),
            'add_new'            => __('Ajouter', 'digital-kappa'),
            'add_new_item'       => __('Ajouter un produit', 'digital-kappa'),
            'edit_item'          => __('Modifier le produit', 'digital-kappa'),
            'new_item'           => __('Nouveau produit', 'digital-kappa'),
            'view_item'          => __('Voir le produit', 'digital-kappa'),
            'search_items'       => __('Rechercher un produit', 'digital-kappa'),
            'not_found'          => __('Aucun produit trouvé', 'digital-kappa'),
            'not_found_in_trash' => __('Aucun produit dans la corbeille', 'digital-kappa'),
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'produit'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    ));

    // Product Categories
    register_taxonomy('dk_product_category', 'dk_product', array(
        'labels'            => array(
            'name'              => __('Catégories', 'digital-kappa'),
            'singular_name'     => __('Catégorie', 'digital-kappa'),
            'search_items'      => __('Rechercher une catégorie', 'digital-kappa'),
            'all_items'         => __('Toutes les catégories', 'digital-kappa'),
            'parent_item'       => __('Catégorie parente', 'digital-kappa'),
            'parent_item_colon' => __('Catégorie parente:', 'digital-kappa'),
            'edit_item'         => __('Modifier la catégorie', 'digital-kappa'),
            'update_item'       => __('Mettre à jour la catégorie', 'digital-kappa'),
            'add_new_item'      => __('Ajouter une catégorie', 'digital-kappa'),
            'new_item_name'     => __('Nouvelle catégorie', 'digital-kappa'),
            'menu_name'         => __('Catégories', 'digital-kappa'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'categorie-produit'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'digital_kappa_register_post_types');

/**
 * Add Meta Boxes for Products
 */
function digital_kappa_add_meta_boxes() {
    add_meta_box(
        'dk_product_details',
        __('Détails du produit', 'digital-kappa'),
        'digital_kappa_product_meta_box',
        'dk_product',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'digital_kappa_add_meta_boxes');

function digital_kappa_product_meta_box($post) {
    wp_nonce_field('dk_product_meta_box', 'dk_product_meta_box_nonce');

    $price = get_post_meta($post->ID, '_dk_price', true);
    $rating = get_post_meta($post->ID, '_dk_rating', true);
    $features = get_post_meta($post->ID, '_dk_features', true);
    $includes = get_post_meta($post->ID, '_dk_includes', true);
    ?>
    <div class="dk-meta-box">
        <p>
            <label for="dk_price"><strong><?php _e('Prix (€)', 'digital-kappa'); ?></strong></label><br>
            <input type="text" id="dk_price" name="dk_price" value="<?php echo esc_attr($price); ?>" class="widefat">
        </p>
        <p>
            <label for="dk_rating"><strong><?php _e('Note (1-5)', 'digital-kappa'); ?></strong></label><br>
            <input type="number" id="dk_rating" name="dk_rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" step="0.1" class="widefat">
        </p>
        <p>
            <label for="dk_features"><strong><?php _e('Fonctionnalités (une par ligne)', 'digital-kappa'); ?></strong></label><br>
            <textarea id="dk_features" name="dk_features" rows="5" class="widefat"><?php echo esc_textarea($features); ?></textarea>
        </p>
        <p>
            <label for="dk_includes"><strong><?php _e('Inclus (un par ligne)', 'digital-kappa'); ?></strong></label><br>
            <textarea id="dk_includes" name="dk_includes" rows="5" class="widefat"><?php echo esc_textarea($includes); ?></textarea>
        </p>
    </div>
    <?php
}

function digital_kappa_save_product_meta($post_id) {
    if (!isset($_POST['dk_product_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['dk_product_meta_box_nonce'], 'dk_product_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['dk_price'])) {
        update_post_meta($post_id, '_dk_price', sanitize_text_field($_POST['dk_price']));
    }

    if (isset($_POST['dk_rating'])) {
        update_post_meta($post_id, '_dk_rating', floatval($_POST['dk_rating']));
    }

    if (isset($_POST['dk_features'])) {
        update_post_meta($post_id, '_dk_features', sanitize_textarea_field($_POST['dk_features']));
    }

    if (isset($_POST['dk_includes'])) {
        update_post_meta($post_id, '_dk_includes', sanitize_textarea_field($_POST['dk_includes']));
    }
}
add_action('save_post_dk_product', 'digital_kappa_save_product_meta');

/**
 * Include template parts
 */
require_once DIGITAL_KAPPA_DIR . '/inc/template-functions.php';
require_once DIGITAL_KAPPA_DIR . '/inc/template-tags.php';

/**
 * Enable SVG uploads
 */
function digital_kappa_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'digital_kappa_mime_types');

/**
 * Disable Gutenberg for specific page templates
 */
function digital_kappa_disable_gutenberg($use_block_editor, $post) {
    $page_template = get_page_template_slug($post->ID);
    $elementor_templates = array(
        'page-templates/elementor-full-width.php',
        'page-templates/elementor-canvas.php',
    );

    if (in_array($page_template, $elementor_templates)) {
        return false;
    }

    return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'digital_kappa_disable_gutenberg', 10, 2);
