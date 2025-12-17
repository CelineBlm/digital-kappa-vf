<?php
/**
 * Create All Products Page with Elementor structure
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create products listing page
 */
function dk_create_products_page() {
    // Check if page exists
    $existing = get_page_by_path('produits');
    if ($existing) {
        return array(
            'status' => 'skipped',
            'message' => 'La page Produits existe déjà',
            'id' => $existing->ID,
        );
    }

    // Elementor data structure
    $elementor_data = array(
        // Page Header
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_page_header', array(
                    'title' => 'Toutes nos ressources',
                    'description' => 'Découvrez notre collection complète de templates, UI kits, icônes et ressources graphiques pour vos projets créatifs.',
                    'show_breadcrumb' => 'yes',
                )),
            ))
        ),
        // Main Content - Filters & Products
        dk_create_section(
            array(
                dk_create_column(25, array(
                    dk_create_widget('dk_product_filters', array()),
                )),
                dk_create_column(75, array(
                    dk_create_widget('dk_product_listing', array(
                        'products_per_page' => 9,
                        'columns' => '3',
                        'show_toolbar' => 'yes',
                        'show_pagination' => 'yes',
                    )),
                )),
            ),
            array('structure' => '30', 'gap' => 'extended')
        ),
    );

    // Create page
    $page_id = wp_insert_post(array(
        'post_title' => 'Toutes nos ressources',
        'post_name' => 'produits',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_content' => '',
        'meta_input' => array(
            '_elementor_edit_mode' => 'builder',
            '_elementor_template_type' => 'wp-page',
            '_elementor_version' => '3.0.0',
            '_elementor_data' => json_encode($elementor_data, JSON_UNESCAPED_UNICODE),
        ),
    ));

    if (is_wp_error($page_id)) {
        return array(
            'status' => 'error',
            'message' => $page_id->get_error_message(),
        );
    }

    return array(
        'status' => 'created',
        'message' => 'Page Produits créée avec succès',
        'id' => $page_id,
    );
}
