<?php
/**
 * Create FAQ Page
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create FAQ page
 */
function dk_create_faq_page() {
    $existing = get_page_by_path('faq');
    if ($existing) {
        return array('status' => 'skipped', 'message' => 'Page FAQ existe déjà', 'id' => $existing->ID);
    }

    $elementor_data = array(
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_page_header', array(
                    'title' => 'Questions fréquentes',
                    'description' => 'Retrouvez les réponses aux questions les plus courantes sur nos produits, le paiement, les téléchargements et le support.',
                )),
            ))
        ),
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_faq_accordion', array(
                    'title' => '',
                    'show_all' => 'yes',
                )),
            ))
        ),
    );

    $page_id = wp_insert_post(array(
        'post_title' => 'FAQ',
        'post_name' => 'faq',
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

    return is_wp_error($page_id)
        ? array('status' => 'error', 'message' => $page_id->get_error_message())
        : array('status' => 'created', 'message' => 'Page FAQ créée', 'id' => $page_id);
}
