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
 * Generate unique Elementor ID
 */
function dk_generate_elementor_id() {
    return substr(md5(uniqid(mt_rand(), true)), 0, 7);
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
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_hero_section', array(
                    'badge' => '✨ Ressources Premium',
                    'title' => 'Propulsez vos projets avec des ressources numériques de qualité premium',
                    'description' => 'Découvrez notre collection exclusive de templates, UI kits, icônes et ressources graphiques créés par des designers experts pour des projets exceptionnels.',
                    'primary_button_text' => 'Découvrir les ressources',
                    'secondary_button_text' => 'Comment ça marche',
                )),
            )),
            array('structure' => '10', 'content_width' => 'full')
        ),
        // Features Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_features_section', array(
                    'title' => 'Pourquoi choisir nos ressources ?',
                )),
            ))
        ),
        // Stats Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_stats_section', array()),
            ))
        ),
        // Products Grid Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_product_grid', array(
                    'title' => 'Nos ressources populaires',
                    'products_count' => 6,
                    'columns' => '3',
                )),
            ))
        ),
        // Process Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_process_section', array(
                    'title' => 'Un processus simple et rapide',
                )),
            ))
        ),
        // Testimonials Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_testimonials', array(
                    'title' => 'Ce que disent nos clients',
                )),
            ))
        ),
        // FAQ Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_faq_accordion', array(
                    'title' => 'Questions fréquentes',
                )),
            ))
        ),
        // CTA Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_cta_section', array(
                    'title' => 'Prêt à transformer vos projets ?',
                    'description' => 'Rejoignez des milliers de créateurs qui utilisent déjà nos ressources pour leurs projets.',
                    'button_text' => 'Parcourir les ressources',
                )),
            ))
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
 * Helper function to create a section
 */
function dk_create_section($columns, $extra_settings = array()) {
    $id = dk_generate_elementor_id();
    $settings = array_merge(array(
        '_id' => $id,
        'structure' => '10',
    ), $extra_settings);

    return array(
        'id' => $id,
        'elType' => 'section',
        'settings' => $settings,
        'elements' => is_array($columns) && isset($columns[0]) && isset($columns[0]['elType']) ? $columns : array($columns),
    );
}

/**
 * Helper function to create a column
 */
function dk_create_column($size, $widgets) {
    $id = dk_generate_elementor_id();
    return array(
        'id' => $id,
        'elType' => 'column',
        'settings' => array(
            '_id' => $id,
            '_column_size' => $size,
        ),
        'elements' => $widgets,
    );
}

/**
 * Helper function to create a widget
 */
function dk_create_widget($widget_type, $settings = array()) {
    $id = dk_generate_elementor_id();
    $settings['_id'] = $id;

    return array(
        'id' => $id,
        'elType' => 'widget',
        'widgetType' => $widget_type,
        'settings' => $settings,
    );
}
