<?php
/**
 * Digital Kappa WooCommerce Configuration
 *
 * @package Digital_Kappa
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if WooCommerce is active
 */
function dk_is_woocommerce_active() {
    return class_exists('WooCommerce');
}

if (!dk_is_woocommerce_active()) {
    return;
}

/**
 * WooCommerce Setup
 */
function dk_woocommerce_setup() {
    // Disable default WooCommerce sidebar
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

    // Change default product per page
    add_filter('loop_shop_per_page', function($cols) {
        return 12;
    });

    // Change product columns
    add_filter('loop_shop_columns', function($columns) {
        return 3;
    });
}
add_action('init', 'dk_woocommerce_setup');

/**
 * Configure WooCommerce for Digital Products
 */
function dk_configure_digital_downloads() {
    // Set download method to redirect
    update_option('woocommerce_file_download_method', 'redirect');

    // Require login for downloads
    update_option('woocommerce_downloads_require_login', 'no');

    // Grant access after payment
    update_option('woocommerce_downloads_grant_access_after_payment', 'yes');
}
add_action('init', 'dk_configure_digital_downloads');

/**
 * Custom product tabs
 */
function dk_custom_product_tabs($tabs) {
    global $product;

    // Remove default tabs
    unset($tabs['additional_information']);

    // Rename description tab
    $tabs['description']['title'] = __('Description', 'digital-kappa');
    $tabs['description']['priority'] = 10;

    // Add features tab if ACF field exists
    if (function_exists('get_field') && get_field('product_features', $product->get_id())) {
        $tabs['features'] = array(
            'title'    => __('Fonctionnalités', 'digital-kappa'),
            'priority' => 20,
            'callback' => 'dk_features_tab_content',
        );
    }

    // Add included tab if ACF field exists
    if (function_exists('get_field') && get_field('product_included', $product->get_id())) {
        $tabs['included'] = array(
            'title'    => __("Ce qui est inclus", 'digital-kappa'),
            'priority' => 30,
            'callback' => 'dk_included_tab_content',
        );
    }

    // Add requirements tab if ACF field exists
    if (function_exists('get_field') && get_field('product_requirements', $product->get_id())) {
        $tabs['requirements'] = array(
            'title'    => __('Prérequis', 'digital-kappa'),
            'priority' => 40,
            'callback' => 'dk_requirements_tab_content',
        );
    }

    // Move reviews to the end
    if (isset($tabs['reviews'])) {
        $tabs['reviews']['priority'] = 50;
    }

    return $tabs;
}
add_filter('woocommerce_product_tabs', 'dk_custom_product_tabs');

/**
 * Features tab content
 */
function dk_features_tab_content() {
    global $product;
    $features = get_field('product_features', $product->get_id());

    if ($features) {
        echo '<div class="product-features-list">';
        echo '<ul class="space-y-3">';
        foreach (explode('|', $features) as $feature) {
            echo '<li class="flex items-start gap-3">';
            echo '<svg class="w-5 h-5 text-[#10b981] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
            echo '<span class="text-[#4a5565]">' . esc_html(trim($feature)) . '</span>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}

/**
 * Included tab content
 */
function dk_included_tab_content() {
    global $product;
    $included = get_field('product_included', $product->get_id());

    if ($included) {
        echo '<div class="product-included-list">';
        echo '<ul class="space-y-3">';
        foreach (explode('|', $included) as $item) {
            echo '<li class="flex items-start gap-3 li.included">';
            echo '<svg class="w-5 h-5 text-[#10b981] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
            echo '<span class="text-[#4a5565]">' . esc_html(trim($item)) . '</span>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}

/**
 * Requirements tab content
 */
function dk_requirements_tab_content() {
    global $product;
    $requirements = get_field('product_requirements', $product->get_id());

    if ($requirements) {
        echo '<div class="product-requirements-list">';
        echo '<ul class="space-y-3">';
        foreach (explode('|', $requirements) as $requirement) {
            echo '<li class="flex items-start gap-3 li.requirement">';
            echo '<svg class="w-5 h-5 text-[#3b82f6] flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
            echo '<span class="text-[#4a5565]">' . esc_html(trim($requirement)) . '</span>';
            echo '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}

/**
 * Custom Add to Cart button text
 */
function dk_add_to_cart_text($text, $product) {
    if ($product->is_type('simple')) {
        return __('Acheter maintenant', 'digital-kappa');
    }
    return $text;
}
add_filter('woocommerce_product_single_add_to_cart_text', 'dk_add_to_cart_text', 10, 2);

/**
 * Custom archive Add to Cart button text
 */
function dk_archive_add_to_cart_text($text, $product) {
    if ($product->is_type('simple')) {
        return __('Voir le produit', 'digital-kappa');
    }
    return $text;
}
add_filter('woocommerce_product_add_to_cart_text', 'dk_archive_add_to_cart_text', 10, 2);

/**
 * Customize checkout fields
 */
function dk_customize_checkout_fields($fields) {
    // Remove unnecessary fields for digital products
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_company']);
    unset($fields['shipping']);

    // Add custom classes
    $fields['billing']['billing_first_name']['class'] = array('checkout-form-field');
    $fields['billing']['billing_last_name']['class'] = array('checkout-form-field');
    $fields['billing']['billing_email']['class'] = array('checkout-form-field', 'full-width');
    $fields['billing']['billing_phone']['class'] = array('checkout-form-field');

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'dk_customize_checkout_fields');

/**
 * Display product rating with custom styling
 */
function dk_get_product_rating_html($rating_html, $rating, $count) {
    if ($rating > 0) {
        $html = '<div class="product-rating flex items-center gap-2">';
        $html .= '<div class="stars flex gap-0.5">';

        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $html .= '<svg class="w-4 h-4 text-[#d2a30b]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
            } else {
                $html .= '<svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
            }
        }

        $html .= '</div>';
        $html .= '<span class="rating-text text-[#4a5565] text-sm">' . number_format($rating, 1) . ' (' . $count . ' avis)</span>';
        $html .= '</div>';

        return $html;
    }

    return $rating_html;
}
add_filter('woocommerce_product_get_rating_html', 'dk_get_product_rating_html', 10, 3);

/**
 * Customize product price HTML
 */
function dk_price_html($price, $product) {
    return '<span class="product-price font-[Merriweather,serif] text-[#d2a30b] font-medium">' . $price . '</span>';
}
add_filter('woocommerce_get_price_html', 'dk_price_html', 10, 2);

/**
 * Add product badges
 */
function dk_product_badge() {
    global $product;

    $badges = array();

    if ($product->is_featured()) {
        $badges[] = '<span class="product-badge absolute top-4 right-4 bg-[#d2a30b] text-white text-xs px-2.5 py-1 rounded-lg font-[Montserrat,sans-serif]">Populaire</span>';
    }

    if ($product->is_on_sale()) {
        $badges[] = '<span class="product-badge sale absolute top-4 left-4 bg-red-500 text-white text-xs px-2.5 py-1 rounded-lg font-[Montserrat,sans-serif]">Promo</span>';
    }

    echo implode('', $badges);
}
add_action('woocommerce_before_shop_loop_item_title', 'dk_product_badge', 5);
add_action('woocommerce_product_thumbnails', 'dk_product_badge', 5);

/**
 * Register ACF fields for products
 */
function dk_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_dk_product_fields',
        'title' => 'Digital Kappa - Product Fields',
        'fields' => array(
            array(
                'key' => 'field_dk_rating',
                'label' => 'Note moyenne',
                'name' => 'product_rating',
                'type' => 'number',
                'min' => 0,
                'max' => 5,
                'step' => 0.1,
                'default_value' => 4.5,
            ),
            array(
                'key' => 'field_dk_review_count',
                'label' => 'Nombre d\'avis',
                'name' => 'product_review_count',
                'type' => 'number',
                'min' => 0,
                'default_value' => 0,
            ),
            array(
                'key' => 'field_dk_features',
                'label' => 'Fonctionnalités',
                'name' => 'product_features',
                'type' => 'textarea',
                'instructions' => 'Une fonctionnalité par ligne ou séparées par |',
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_dk_included',
                'label' => 'Ce qui est inclus',
                'name' => 'product_included',
                'type' => 'textarea',
                'instructions' => 'Un élément par ligne ou séparés par |',
                'new_lines' => 'br',
            ),
            array(
                'key' => 'field_dk_requirements',
                'label' => 'Prérequis',
                'name' => 'product_requirements',
                'type' => 'textarea',
                'instructions' => 'Un prérequis par ligne ou séparés par |',
                'new_lines' => 'br',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'product',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
    ));
}
add_action('acf/init', 'dk_register_acf_fields');
