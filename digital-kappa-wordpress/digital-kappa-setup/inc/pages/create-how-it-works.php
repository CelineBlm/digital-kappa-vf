<?php
/**
 * Create How It Works Page
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create how it works page
 */
function dk_create_how_it_works_page() {
    $existing = get_page_by_path('comment-ca-marche');
    if ($existing) {
        return array('status' => 'skipped', 'message' => 'Page existe déjà', 'id' => $existing->ID);
    }

    $elementor_data = array(
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_page_header', array(
                    'title' => 'Comment ça marche',
                    'description' => 'Découvrez en quelques étapes simples comment accéder à nos ressources premium et les utiliser dans vos projets.',
                )),
            ))
        ),
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_process_section', array('title' => '')),
            ))
        ),
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_cta_section', array(
                    'title' => 'Prêt à commencer ?',
                    'description' => 'Explorez notre catalogue et trouvez les ressources parfaites pour vos projets.',
                    'button_text' => 'Découvrir les ressources',
                )),
            ))
        ),
    );

    $page_id = wp_insert_post(array(
        'post_title' => 'Comment ça marche',
        'post_name' => 'comment-ca-marche',
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
        : array('status' => 'created', 'message' => 'Page Comment ça marche créée', 'id' => $page_id);
}
