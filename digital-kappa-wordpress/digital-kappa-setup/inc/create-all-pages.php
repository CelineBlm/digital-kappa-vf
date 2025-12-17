<?php
/**
 * Create All Pages - Master function
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create all pages
 */
function dk_create_all_pages() {
    $results = array(
        'created' => array(),
        'skipped' => array(),
        'errors' => array(),
    );

    // List of page creation functions
    $pages = array(
        'dk_create_home_page' => 'Accueil',
        'dk_create_products_page' => 'Produits',
        'dk_create_checkout_page' => 'Checkout',
        'dk_create_confirmation_page' => 'Confirmation',
        'dk_create_how_it_works_page' => 'Comment ça marche',
        'dk_create_faq_page' => 'FAQ',
        'dk_create_about_page' => 'À propos',
        'dk_create_cgv_page' => 'CGV',
        'dk_create_privacy_page' => 'Confidentialité',
        'dk_create_product_detail_template' => 'Template Produit',
    );

    foreach ($pages as $function => $name) {
        if (function_exists($function)) {
            $result = call_user_func($function);

            if ($result['status'] === 'created') {
                $results['created'][] = $name;
            } elseif ($result['status'] === 'skipped') {
                $results['skipped'][] = $name;
            } else {
                $results['errors'][] = $name . ': ' . $result['message'];
            }
        } else {
            $results['errors'][] = $name . ': Fonction non trouvée';
        }
    }

    $results['count'] = count($results['created']) + count($results['skipped']);

    return $results;
}
