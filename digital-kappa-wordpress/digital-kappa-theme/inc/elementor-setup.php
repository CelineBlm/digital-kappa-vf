<?php
/**
 * Digital Kappa Elementor Setup
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if Elementor is installed
 */
function dk_is_elementor_active() {
    return did_action('elementor/loaded');
}

/**
 * Register Elementor Widgets
 */
function dk_register_elementor_widgets($widgets_manager) {
    // Include all widget files
    $widgets = array(
        'dk-header',
        'dk-header-logo',
        'dk-header-search',
        'dk-footer',
        'dk-footer-logo',
        'dk-product-card',
        'dk-hero-section',
        'dk-features-section',
        'dk-stats-section',
        'dk-product-grid',
        'dk-process-section',
        'dk-testimonials',
        'dk-faq-accordion',
        'dk-cta-section',
        'dk-categories-section',
        'dk-about-section',
        'dk-product-filters',
        'dk-product-listing',
        'dk-product-gallery',
        'dk-product-info',
        'dk-product-features',
        'dk-product-tabs',
        'dk-product-related',
        'dk-checkout-form',
        'dk-order-summary',
        'dk-order-confirmation',
        'dk-page-header',
    );

    foreach ($widgets as $widget) {
        $widget_file = DK_THEME_DIR . '/elementor-widgets/' . $widget . '.php';
        if (file_exists($widget_file)) {
            require_once $widget_file;
        }
    }

    // Register widgets
    $widget_classes = array(
        'DK_Header_Widget',
        'DK_Header_Logo_Widget',
        'DK_Header_Search_Widget',
        'DK_Footer_Widget',
        'DK_Footer_Logo_Widget',
        'DK_Product_Card_Widget',
        'DK_Hero_Section_Widget',
        'DK_Features_Section_Widget',
        'DK_Stats_Section_Widget',
        'DK_Product_Grid_Widget',
        'DK_Process_Section_Widget',
        'DK_Testimonials_Widget',
        'DK_FAQ_Accordion_Widget',
        'DK_CTA_Section_Widget',
        'DK_Categories_Section_Widget',
        'DK_About_Section_Widget',
        'DK_Product_Filters_Widget',
        'DK_Product_Listing_Widget',
        'DK_Product_Gallery_Widget',
        'DK_Product_Info_Widget',
        'DK_Product_Features_Widget',
        'DK_Product_Tabs_Widget',
        'DK_Product_Related_Widget',
        'DK_Checkout_Form_Widget',
        'DK_Order_Summary_Widget',
        'DK_Order_Confirmation_Widget',
        'DK_Page_Header_Widget',
    );

    foreach ($widget_classes as $class) {
        if (class_exists($class)) {
            $widgets_manager->register(new $class());
        }
    }
}
add_action('elementor/widgets/register', 'dk_register_elementor_widgets');

/**
 * Register Elementor Widget Category
 */
function dk_add_elementor_widget_category($elements_manager) {
    $elements_manager->add_category(
        'digital-kappa',
        array(
            'title' => __('Digital Kappa', 'digital-kappa'),
            'icon'  => 'fa fa-cube',
        )
    );
}
add_action('elementor/elements/categories_registered', 'dk_add_elementor_widget_category');

/**
 * Add custom Elementor icons
 */
function dk_elementor_icons($tabs) {
    $tabs['dk-icons'] = array(
        'name'          => 'dk-icons',
        'label'         => __('Digital Kappa', 'digital-kappa'),
        'url'           => DK_THEME_URI . '/assets/css/dk-icons.css',
        'enqueue'       => array(DK_THEME_URI . '/assets/css/dk-icons.css'),
        'prefix'        => 'dk-',
        'displayPrefix' => 'dk',
        'labelIcon'     => 'fas fa-cube',
        'ver'           => DK_THEME_VERSION,
        'fetchJson'     => DK_THEME_URI . '/assets/icons/dk-icons.json',
    );
    return $tabs;
}
add_filter('elementor/icons_manager/additional_tabs', 'dk_elementor_icons');

/**
 * Enqueue Editor Scripts
 */
function dk_elementor_editor_scripts() {
    wp_enqueue_style(
        'dk-elementor-editor',
        DK_THEME_URI . '/assets/css/elementor-editor.css',
        array(),
        DK_THEME_VERSION
    );
}
add_action('elementor/editor/after_enqueue_scripts', 'dk_elementor_editor_scripts');

/**
 * Enqueue Preview Scripts
 */
function dk_elementor_preview_scripts() {
    wp_enqueue_style(
        'dk-elementor-preview',
        DK_THEME_URI . '/assets/css/digital-kappa-styles.css',
        array(),
        DK_THEME_VERSION
    );
}
add_action('elementor/preview/enqueue_styles', 'dk_elementor_preview_scripts');

/**
 * Register Elementor Locations for Theme Builder
 */
function dk_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_all_core_location();

    $elementor_theme_manager->register_location(
        'dk-header',
        array(
            'label'           => __('Digital Kappa Header', 'digital-kappa'),
            'multiple'        => false,
            'edit_in_content' => true,
        )
    );

    $elementor_theme_manager->register_location(
        'dk-footer',
        array(
            'label'           => __('Digital Kappa Footer', 'digital-kappa'),
            'multiple'        => false,
            'edit_in_content' => true,
        )
    );
}
add_action('elementor/theme/register_locations', 'dk_register_elementor_locations');

/**
 * Custom controls for Digital Kappa colors
 */
function dk_register_elementor_controls() {
    \Elementor\Plugin::$instance->controls_manager->add_group_control(
        'dk-colors',
        new \Elementor\Group_Control_Background()
    );
}

/**
 * Default Elementor settings for Digital Kappa
 */
function dk_set_elementor_defaults() {
    update_option('elementor_default_generic_fonts', 'Montserrat, sans-serif');
    update_option('elementor_container_width', 1280);
    update_option('elementor_space_between_widgets', 0);
    update_option('elementor_stretched_section_container', '');
    update_option('elementor_page_title_selector', 'h1.entry-title, h1.dk-page-title');
    update_option('elementor_disable_color_schemes', 'yes');
    update_option('elementor_disable_typography_schemes', 'yes');
}

/**
 * Global colors for Elementor
 */
function dk_elementor_global_colors($config) {
    $config['initial_document']['settings']['settings'] = array(
        'dk_gold' => '#d2a30b',
        'dk_gold_hover' => '#b8900a',
        'dk_gold_light' => '#fffbf0',
        'dk_black' => '#1a1a1a',
        'dk_gray' => '#4a5565',
        'dk_dark' => '#2b2d31',
        'dk_light' => '#f9fafb',
    );
    return $config;
}
add_filter('elementor/document/config', 'dk_elementor_global_colors');
