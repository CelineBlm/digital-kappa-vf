<?php
/**
 * Create Header Template for Elementor Theme Builder
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create header template
 */
function dk_create_header_template() {
    // Check if template exists
    $existing = get_posts(array(
        'post_type' => 'elementor_library',
        'meta_key' => '_elementor_template_type',
        'meta_value' => 'header',
        'name' => 'dk-header',
        'posts_per_page' => 1,
    ));

    if (!empty($existing)) {
        return array('status' => 'skipped', 'message' => 'Header existe déjà', 'id' => $existing[0]->ID);
    }

    // Elementor data for header
    $elementor_data = array(
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array(
                'structure' => '30',
                'background_background' => 'classic',
                'background_color' => '#ffffff',
                'border_border' => 'solid',
                'border_width' => array('bottom' => '1', 'unit' => 'px'),
                'border_color' => '#f3f4f6',
                'padding' => array('top' => '16', 'bottom' => '16', 'unit' => 'px'),
            ),
            'elements' => array(
                // Logo Column
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 25),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_header_logo',
                            'settings' => array(
                                'logo_type' => 'icon_text',
                                'logo_title' => 'Digital Kappa',
                                'logo_tagline' => 'Ressources Premium',
                            ),
                        ),
                    ),
                ),
                // Search Column
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 50),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_header_search',
                            'settings' => array(
                                'placeholder' => 'Rechercher une ressource...',
                            ),
                        ),
                    ),
                ),
                // Navigation Column
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 25),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'nav-menu',
                            'settings' => array(
                                'menu' => 'menu-principal',
                                'layout' => 'horizontal',
                                'align_items' => 'flex-end',
                                'pointer' => 'none',
                                'text_color' => '#1a1a1a',
                                'text_color_hover' => '#d2a30b',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    // Create template
    $template_id = wp_insert_post(array(
        'post_title' => 'DK Header',
        'post_name' => 'dk-header',
        'post_status' => 'publish',
        'post_type' => 'elementor_library',
        'post_content' => '',
        'meta_input' => array(
            '_elementor_edit_mode' => 'builder',
            '_elementor_template_type' => 'header',
            '_elementor_version' => '3.0.0',
            '_elementor_data' => wp_json_encode($elementor_data),
            '_wp_page_template' => 'elementor_header_footer',
        ),
    ));

    if (is_wp_error($template_id)) {
        return array('status' => 'error', 'message' => $template_id->get_error_message());
    }

    // Set conditions - entire site
    update_post_meta($template_id, '_elementor_conditions', array('include/general'));

    return array('status' => 'created', 'message' => 'Header créé', 'id' => $template_id);
}
