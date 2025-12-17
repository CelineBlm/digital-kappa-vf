<?php
/**
 * Create Checkout Page with Elementor structure
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create checkout page
 */
function dk_create_checkout_page() {
    // Check if page exists
    $existing = get_page_by_path('commander');
    if ($existing) {
        return array(
            'status' => 'skipped',
            'message' => 'La page Commander existe déjà',
            'id' => $existing->ID,
        );
    }

    // Elementor data structure
    $elementor_data = array(
        // Page Header
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
                            'widgetType' => 'heading',
                            'settings' => array(
                                'title' => 'Finaliser votre commande',
                                'align' => 'center',
                                'header_size' => 'h1',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // Checkout Form and Summary
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array(
                'structure' => '30',
                'gap' => 'extended',
            ),
            'elements' => array(
                // Checkout Form
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 66),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_checkout_form',
                            'settings' => array(
                                'billing_title' => 'Informations de facturation',
                                'payment_title' => 'Méthode de paiement',
                            ),
                        ),
                    ),
                ),
                // Order Summary
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 33),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_order_summary',
                            'settings' => array(
                                'title' => 'Votre commande',
                                'button_text' => 'Confirmer et payer',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    // Create page
    $page_id = wp_insert_post(array(
        'post_title' => 'Commander',
        'post_name' => 'commander',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_content' => '',
        'meta_input' => array(
            '_elementor_edit_mode' => 'builder',
            '_elementor_template_type' => 'wp-page',
            '_elementor_version' => '3.0.0',
            '_elementor_data' => wp_json_encode($elementor_data),
        ),
    ));

    if (is_wp_error($page_id)) {
        return array(
            'status' => 'error',
            'message' => $page_id->get_error_message(),
        );
    }

    // Set as WooCommerce checkout page
    update_option('woocommerce_checkout_page_id', $page_id);

    return array(
        'status' => 'created',
        'message' => 'Page Commander créée avec succès',
        'id' => $page_id,
    );
}
