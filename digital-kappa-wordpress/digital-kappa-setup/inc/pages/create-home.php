<?php
/**
 * Create Home Page with Elementor structure
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create home page with Elementor widgets
 */
function dk_create_home_page() {
    // Check if page exists
    $existing = get_page_by_path('accueil');
    if ($existing) {
        return array(
            'status' => 'skipped',
            'message' => 'La page Accueil existe déjà',
            'id' => $existing->ID,
        );
    }

    // Elementor data structure for home page
    $elementor_data = array(
        // Hero Section
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array(
                'structure' => '10',
                'content_width' => 'full',
            ),
            'elements' => array(
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 100),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_hero_section',
                            'settings' => array(
                                'badge' => '✨ Ressources Premium',
                                'title' => 'Propulsez vos projets avec des ressources numériques de qualité premium',
                                'description' => 'Découvrez notre collection exclusive de templates, UI kits, icônes et ressources graphiques créés par des designers experts pour des projets exceptionnels.',
                                'primary_button_text' => 'Découvrir les ressources',
                                'secondary_button_text' => 'Comment ça marche',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // Features Section
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
                            'widgetType' => 'dk_features_section',
                            'settings' => array(
                                'title' => 'Pourquoi choisir nos ressources ?',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // Stats Section
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
                            'widgetType' => 'dk_stats_section',
                            'settings' => array(),
                        ),
                    ),
                ),
            ),
        ),
        // Products Grid Section
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
                            'widgetType' => 'dk_product_grid',
                            'settings' => array(
                                'title' => 'Nos ressources populaires',
                                'products_count' => 6,
                                'columns' => '3',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // Process Section
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
                            'widgetType' => 'dk_process_section',
                            'settings' => array(
                                'title' => 'Un processus simple et rapide',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // Testimonials Section
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
                            'widgetType' => 'dk_testimonials',
                            'settings' => array(
                                'title' => 'Ce que disent nos clients',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // FAQ Section
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
                            'widgetType' => 'dk_faq_accordion',
                            'settings' => array(
                                'title' => 'Questions fréquentes',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // CTA Section
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
                            'widgetType' => 'dk_cta_section',
                            'settings' => array(
                                'title' => 'Prêt à transformer vos projets ?',
                                'description' => 'Rejoignez des milliers de créateurs qui utilisent déjà nos ressources pour leurs projets.',
                                'button_text' => 'Parcourir les ressources',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    // Create page
    $page_id = wp_insert_post(array(
        'post_title' => 'Accueil',
        'post_name' => 'accueil',
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

    // Set as front page
    update_option('page_on_front', $page_id);
    update_option('show_on_front', 'page');

    return array(
        'status' => 'created',
        'message' => 'Page Accueil créée avec succès',
        'id' => $page_id,
    );
}

/**
 * Generate unique Elementor ID
 */
function dk_generate_elementor_id() {
    return substr(md5(uniqid(mt_rand(), true)), 0, 8);
}
