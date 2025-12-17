<?php
/**
 * Create Product Detail Template (for WooCommerce single product)
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create product detail template
 * Note: This creates an Elementor template for single product pages
 */
function dk_create_product_detail_template() {
    // Check if template exists
    $existing = get_posts(array(
        'post_type' => 'elementor_library',
        'meta_key' => '_elementor_template_type',
        'meta_value' => 'single',
        'name' => 'dk-single-product',
        'posts_per_page' => 1,
    ));

    if (!empty($existing)) {
        return array('status' => 'skipped', 'message' => 'Template produit existe déjà', 'id' => $existing[0]->ID);
    }

    // Elementor data structure for product detail
    $elementor_data = array(
        // Breadcrumb
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array('structure' => '10'),
            'elements' => array(
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 100),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'woocommerce-breadcrumb',
                            'settings' => array(),
                        ),
                    ),
                ),
            ),
        ),
        // Main Product Section
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array('structure' => '20'),
            'elements' => array(
                // Gallery Column
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 50),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_product_gallery',
                            'settings' => array(),
                        ),
                    ),
                ),
                // Info Column
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 50),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_product_info',
                            'settings' => array(),
                        ),
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_product_features',
                            'settings' => array(),
                        ),
                    ),
                ),
            ),
        ),
        // Tabs Section
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array('structure' => '10'),
            'elements' => array(
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 100),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_product_tabs',
                            'settings' => array(),
                        ),
                    ),
                ),
            ),
        ),
        // Related Products Section
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array('structure' => '10'),
            'elements' => array(
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 100),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_product_related',
                            'settings' => array(
                                'title' => 'Produits similaires',
                                'products_count' => 4,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    // Create template
    $template_id = wp_insert_post(array(
        'post_title' => 'DK Single Product Template',
        'post_name' => 'dk-single-product',
        'post_status' => 'publish',
        'post_type' => 'elementor_library',
        'post_content' => '',
        'meta_input' => array(
            '_elementor_edit_mode' => 'builder',
            '_elementor_template_type' => 'single',
            '_elementor_version' => '3.0.0',
            '_elementor_data' => wp_json_encode($elementor_data),
            '_wp_page_template' => 'elementor_canvas',
        ),
    ));

    if (is_wp_error($template_id)) {
        return array('status' => 'error', 'message' => $template_id->get_error_message());
    }

    // Set conditions for WooCommerce single product
    update_post_meta($template_id, '_elementor_conditions', array('include/singular/product'));

    return array('status' => 'created', 'message' => 'Template produit créé', 'id' => $template_id);
}
