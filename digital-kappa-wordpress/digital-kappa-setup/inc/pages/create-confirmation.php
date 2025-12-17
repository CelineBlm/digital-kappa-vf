<?php
/**
 * Create Order Confirmation Page with Elementor structure
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create order confirmation page
 */
function dk_create_confirmation_page() {
    // Check if page exists
    $existing = get_page_by_path('confirmation-commande');
    if ($existing) {
        return array(
            'status' => 'skipped',
            'message' => 'La page Confirmation existe déjà',
            'id' => $existing->ID,
        );
    }

    // Elementor data structure
    $elementor_data = array(
        // Order Confirmation Widget
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_order_confirmation', array(
                    'title' => 'Merci pour votre achat !',
                    'subtitle' => 'Votre commande a bien été confirmée',
                    'downloads_title' => 'Vos téléchargements',
                )),
            ))
        ),
    );

    // Create page
    $page_id = wp_insert_post(array(
        'post_title' => 'Confirmation de commande',
        'post_name' => 'confirmation-commande',
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
        'message' => 'Page Confirmation créée avec succès',
        'id' => $page_id,
    );
}
