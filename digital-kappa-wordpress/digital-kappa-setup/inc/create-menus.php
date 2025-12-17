<?php
/**
 * Create WordPress Menus
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create all menus
 */
function dk_create_menus() {
    $results = array(
        'created' => array(),
        'skipped' => array(),
        'errors' => array(),
    );

    // Create Main Menu
    $main_menu_result = dk_create_main_menu();
    if ($main_menu_result['status'] === 'created') {
        $results['created'][] = 'Menu Principal';
    } elseif ($main_menu_result['status'] === 'skipped') {
        $results['skipped'][] = 'Menu Principal';
    }

    // Create Footer Menu
    $footer_menu_result = dk_create_footer_menu();
    if ($footer_menu_result['status'] === 'created') {
        $results['created'][] = 'Menu Footer';
    } elseif ($footer_menu_result['status'] === 'skipped') {
        $results['skipped'][] = 'Menu Footer';
    }

    // Create Legal Menu
    $legal_menu_result = dk_create_legal_menu();
    if ($legal_menu_result['status'] === 'created') {
        $results['created'][] = 'Menu Légal';
    } elseif ($legal_menu_result['status'] === 'skipped') {
        $results['skipped'][] = 'Menu Légal';
    }

    return $results;
}

/**
 * Create main navigation menu
 */
function dk_create_main_menu() {
    $menu_name = 'Menu Principal';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if ($menu_exists) {
        return array('status' => 'skipped', 'id' => $menu_exists->term_id);
    }

    $menu_id = wp_create_nav_menu($menu_name);

    if (is_wp_error($menu_id)) {
        return array('status' => 'error', 'message' => $menu_id->get_error_message());
    }

    // Menu items
    $menu_items = array(
        array('title' => 'Accueil', 'url' => home_url('/'), 'order' => 1),
        array('title' => 'Ressources', 'slug' => 'produits', 'order' => 2),
        array('title' => 'Comment ça marche', 'slug' => 'comment-ca-marche', 'order' => 3),
        array('title' => 'FAQ', 'slug' => 'faq', 'order' => 4),
        array('title' => 'À propos', 'slug' => 'a-propos', 'order' => 5),
    );

    foreach ($menu_items as $item) {
        $item_data = array(
            'menu-item-title' => $item['title'],
            'menu-item-status' => 'publish',
            'menu-item-position' => $item['order'],
        );

        if (isset($item['url'])) {
            $item_data['menu-item-url'] = $item['url'];
            $item_data['menu-item-type'] = 'custom';
        } elseif (isset($item['slug'])) {
            $page = get_page_by_path($item['slug']);
            if ($page) {
                $item_data['menu-item-object-id'] = $page->ID;
                $item_data['menu-item-object'] = 'page';
                $item_data['menu-item-type'] = 'post_type';
            } else {
                $item_data['menu-item-url'] = home_url('/' . $item['slug'] . '/');
                $item_data['menu-item-type'] = 'custom';
            }
        }

        wp_update_nav_menu_item($menu_id, 0, $item_data);
    }

    // Assign to theme location
    $locations = get_theme_mod('nav_menu_locations', array());
    $locations['primary'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

    return array('status' => 'created', 'id' => $menu_id);
}

/**
 * Create footer menu
 */
function dk_create_footer_menu() {
    $menu_name = 'Menu Footer';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if ($menu_exists) {
        return array('status' => 'skipped', 'id' => $menu_exists->term_id);
    }

    $menu_id = wp_create_nav_menu($menu_name);

    if (is_wp_error($menu_id)) {
        return array('status' => 'error', 'message' => $menu_id->get_error_message());
    }

    $menu_items = array(
        array('title' => 'Ressources', 'slug' => 'produits', 'order' => 1),
        array('title' => 'Comment ça marche', 'slug' => 'comment-ca-marche', 'order' => 2),
        array('title' => 'FAQ', 'slug' => 'faq', 'order' => 3),
        array('title' => 'À propos', 'slug' => 'a-propos', 'order' => 4),
    );

    foreach ($menu_items as $item) {
        $page = get_page_by_path($item['slug']);
        $item_data = array(
            'menu-item-title' => $item['title'],
            'menu-item-status' => 'publish',
            'menu-item-position' => $item['order'],
        );

        if ($page) {
            $item_data['menu-item-object-id'] = $page->ID;
            $item_data['menu-item-object'] = 'page';
            $item_data['menu-item-type'] = 'post_type';
        } else {
            $item_data['menu-item-url'] = home_url('/' . $item['slug'] . '/');
            $item_data['menu-item-type'] = 'custom';
        }

        wp_update_nav_menu_item($menu_id, 0, $item_data);
    }

    // Assign to theme location
    $locations = get_theme_mod('nav_menu_locations', array());
    $locations['footer'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

    return array('status' => 'created', 'id' => $menu_id);
}

/**
 * Create legal menu
 */
function dk_create_legal_menu() {
    $menu_name = 'Menu Légal';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if ($menu_exists) {
        return array('status' => 'skipped', 'id' => $menu_exists->term_id);
    }

    $menu_id = wp_create_nav_menu($menu_name);

    if (is_wp_error($menu_id)) {
        return array('status' => 'error', 'message' => $menu_id->get_error_message());
    }

    $menu_items = array(
        array('title' => 'CGV', 'slug' => 'conditions-generales-de-vente', 'order' => 1),
        array('title' => 'Confidentialité', 'slug' => 'politique-de-confidentialite', 'order' => 2),
    );

    foreach ($menu_items as $item) {
        $page = get_page_by_path($item['slug']);
        $item_data = array(
            'menu-item-title' => $item['title'],
            'menu-item-status' => 'publish',
            'menu-item-position' => $item['order'],
        );

        if ($page) {
            $item_data['menu-item-object-id'] = $page->ID;
            $item_data['menu-item-object'] = 'page';
            $item_data['menu-item-type'] = 'post_type';
        } else {
            $item_data['menu-item-url'] = home_url('/' . $item['slug'] . '/');
            $item_data['menu-item-type'] = 'custom';
        }

        wp_update_nav_menu_item($menu_id, 0, $item_data);
    }

    // Assign to theme location
    $locations = get_theme_mod('nav_menu_locations', array());
    $locations['legal'] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations);

    return array('status' => 'created', 'id' => $menu_id);
}
