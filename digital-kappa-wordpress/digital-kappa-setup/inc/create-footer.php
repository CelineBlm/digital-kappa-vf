<?php
/**
 * Create Footer Template for Elementor Theme Builder
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create footer template
 */
function dk_create_footer_template() {
    // Check if template exists
    $existing = get_posts(array(
        'post_type' => 'elementor_library',
        'meta_key' => '_elementor_template_type',
        'meta_value' => 'footer',
        'name' => 'dk-footer',
        'posts_per_page' => 1,
    ));

    if (!empty($existing)) {
        return array('status' => 'skipped', 'message' => 'Footer existe déjà', 'id' => $existing[0]->ID);
    }

    // Elementor data for footer
    $elementor_data = array(
        // Main Footer Section
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array(
                'structure' => '40',
                'background_background' => 'classic',
                'background_color' => '#1a1a1a',
                'padding' => array('top' => '60', 'bottom' => '40', 'unit' => 'px'),
            ),
            'elements' => array(
                // Logo Column
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 33),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_footer_logo',
                            'settings' => array(
                                'logo_type' => 'icon_text',
                                'logo_title' => 'Digital Kappa',
                            ),
                        ),
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'text-editor',
                            'settings' => array(
                                'editor' => '<p style="color: rgba(255,255,255,0.7); font-size: 14px;">Votre marketplace de ressources numériques premium pour créateurs et développeurs.</p>',
                            ),
                        ),
                    ),
                ),
                // Links Column 1
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 22),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'heading',
                            'settings' => array(
                                'title' => 'Ressources',
                                'header_size' => 'h4',
                                'title_color' => '#ffffff',
                            ),
                        ),
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'nav-menu',
                            'settings' => array(
                                'menu' => 'menu-footer',
                                'layout' => 'vertical',
                                'text_color' => 'rgba(255,255,255,0.7)',
                                'text_color_hover' => '#ffffff',
                            ),
                        ),
                    ),
                ),
                // Links Column 2
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 22),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'heading',
                            'settings' => array(
                                'title' => 'Légal',
                                'header_size' => 'h4',
                                'title_color' => '#ffffff',
                            ),
                        ),
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'nav-menu',
                            'settings' => array(
                                'menu' => 'menu-legal',
                                'layout' => 'vertical',
                                'text_color' => 'rgba(255,255,255,0.7)',
                                'text_color_hover' => '#ffffff',
                            ),
                        ),
                    ),
                ),
                // Contact Column
                array(
                    'id' => dk_generate_elementor_id(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 23),
                    'elements' => array(
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'heading',
                            'settings' => array(
                                'title' => 'Contact',
                                'header_size' => 'h4',
                                'title_color' => '#ffffff',
                            ),
                        ),
                        array(
                            'id' => dk_generate_elementor_id(),
                            'elType' => 'widget',
                            'widgetType' => 'text-editor',
                            'settings' => array(
                                'editor' => '<p style="color: rgba(255,255,255,0.7); font-size: 14px;">contact@digital-kappa.com</p>',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        // Copyright Section
        array(
            'id' => dk_generate_elementor_id(),
            'elType' => 'section',
            'settings' => array(
                'structure' => '10',
                'background_background' => 'classic',
                'background_color' => '#1a1a1a',
                'border_border' => 'solid',
                'border_width' => array('top' => '1', 'unit' => 'px'),
                'border_color' => 'rgba(255,255,255,0.1)',
                'padding' => array('top' => '20', 'bottom' => '20', 'unit' => 'px'),
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
                            'widgetType' => 'text-editor',
                            'settings' => array(
                                'editor' => '<p style="color: rgba(255,255,255,0.5); font-size: 14px; text-align: center;">© 2025 Digital Kappa. Tous droits réservés.</p>',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    // Create template
    $template_id = wp_insert_post(array(
        'post_title' => 'DK Footer',
        'post_name' => 'dk-footer',
        'post_status' => 'publish',
        'post_type' => 'elementor_library',
        'post_content' => '',
        'meta_input' => array(
            '_elementor_edit_mode' => 'builder',
            '_elementor_template_type' => 'footer',
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

    return array('status' => 'created', 'message' => 'Footer créé', 'id' => $template_id);
}
