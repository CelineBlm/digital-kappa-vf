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
                    'badge_text' => 'Lancement officiel - Nouveaux produits disponibles',
                    'title_line_1' => 'Marketplace de',
                    'title_line_2' => 'produits digitaux',
                    'description' => 'Découvrez une sélection de produits digitaux de qualité : applications mobiles, ebooks et templates pour booster votre productivité. Achat simple en un clic, téléchargement immédiat, accès à vie.',
                    'button_primary_text' => 'Explorer les produits',
                    'button_secondary_text' => 'Comment ça marche',
                    'button_primary_link' => array('url' => '/produits/'),
                    'button_secondary_link' => array('url' => '/comment-ca-marche/'),
                )),
            )),
            array('structure' => '10', 'content_width' => 'full')
        ),
        // Features Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_features_section', array(
                    'section_title' => 'Pourquoi choisir Digital Kappa',
                    'section_description' => 'Une plateforme conçue pour vous offrir la meilleure expérience d\'achat de produits digitaux',
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
                    'section_title' => 'Découvrez nos produits',
                    'section_description' => 'Une sélection de produits digitaux de haute qualité pour développeurs et créateurs',
                    'products_count' => 3,
                    'columns' => '3',
                    'show_button' => 'yes',
                    'button_text' => 'Voir tous les produits',
                )),
            ))
        ),
        // Categories Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_categories_section', array(
                    'section_title' => 'Catégories de produits',
                    'section_description' => 'Explorez notre sélection organisée de produits digitaux dans nos catégories principales',
                )),
            ))
        ),
        // About Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_about_section', array(
                    'section_title' => 'Digital Kappa, votre partenaire digital',
                    'description_1' => 'Chez Digital Kappa, nous créons et sélectionnons avec soin chaque produit digital pour répondre aux besoins des entrepreneurs, développeurs et créateurs modernes.',
                    'description_2' => 'Notre mission est de vous faire gagner du temps en vous proposant des solutions prêtes à l\'emploi, testées et documentées.',
                )),
            ))
        ),
        // FAQ Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_faq_accordion', array(
                    'section_title' => 'Questions fréquentes',
                    'section_description' => 'Tout ce que vous devez savoir sur Digital Kappa',
                )),
            ))
        ),
        // CTA Section
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_cta_section', array(
                    'title' => 'Prêt à découvrir nos produits digitaux ?',
                    'description' => 'Rejoignez des centaines de développeurs et créateurs qui utilisent nos produits pour accélérer leurs projets',
                    'button_text' => 'Explorer le catalogue',
                    'button_link' => array('url' => '/produits/'),
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
            '_elementor_data' => json_encode($elementor_data, JSON_UNESCAPED_UNICODE),
            '_wp_page_template' => 'elementor_header_footer',
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
