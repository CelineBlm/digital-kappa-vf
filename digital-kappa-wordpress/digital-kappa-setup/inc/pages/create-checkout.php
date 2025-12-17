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
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('heading', array(
                    'title' => 'Finaliser votre commande',
                    'align' => 'center',
                    'header_size' => 'h1',
                )),
            ))
        ),
        // Checkout Form and Summary
        dk_create_section(
            array(
                dk_create_column(66, array(
                    dk_create_widget('dk_checkout_form', array(
                        'billing_title' => 'Informations de facturation',
                        'payment_title' => 'Méthode de paiement',
                    )),
                )),
                dk_create_column(33, array(
                    dk_create_widget('dk_order_summary', array(
                        'title' => 'Votre commande',
                        'button_text' => 'Confirmer et payer',
                    )),
                )),
            ),
            array('structure' => '30', 'gap' => 'extended')
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
            '_elementor_data' => json_encode($elementor_data, JSON_UNESCAPED_UNICODE),
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
