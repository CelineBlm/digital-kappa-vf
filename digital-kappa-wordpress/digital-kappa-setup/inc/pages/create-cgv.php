<?php
/**
 * Create CGV (Terms of Sale) Page
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create CGV page
 */
function dk_create_cgv_page() {
    $existing = get_page_by_path('conditions-generales-de-vente');
    if ($existing) {
        return array('status' => 'skipped', 'message' => 'Page CGV existe déjà', 'id' => $existing->ID);
    }

    $elementor_data = array(
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
                            'widgetType' => 'dk_page_header',
                            'settings' => array(
                                'title' => 'Conditions Générales de Vente',
                                'description' => 'Dernière mise à jour : Janvier 2025',
                            ),
                        ),
                    ),
                ),
            ),
        ),
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
                            'widgetType' => 'text-editor',
                            'settings' => array(
                                'editor' => '<div class="legal-content">
<h2>1. Objet</h2>
<p>Les présentes Conditions Générales de Vente régissent la vente de produits numériques sur le site Digital Kappa.</p>

<h2>2. Produits</h2>
<p>Les produits vendus sont des ressources numériques téléchargeables : templates, UI kits, icônes, illustrations et autres fichiers graphiques.</p>

<h2>3. Prix</h2>
<p>Les prix sont indiqués en euros TTC. Digital Kappa se réserve le droit de modifier les prix à tout moment.</p>

<h2>4. Paiement</h2>
<p>Le paiement s\'effectue en ligne par carte bancaire ou PayPal. La transaction est sécurisée.</p>

<h2>5. Livraison</h2>
<p>Les produits sont disponibles au téléchargement immédiatement après validation du paiement. Un email de confirmation contenant les liens de téléchargement est envoyé.</p>

<h2>6. Licence d\'utilisation</h2>
<p>L\'achat confère une licence d\'utilisation personnelle et commerciale des ressources, sauf mention contraire. La revente ou redistribution des fichiers sources est interdite.</p>

<h2>7. Droit de rétractation</h2>
<p>Conformément à la réglementation, le droit de rétractation ne s\'applique pas aux contenus numériques téléchargés. Toutefois, nous offrons une garantie satisfait ou remboursé de 30 jours.</p>

<h2>8. Support</h2>
<p>Un support technique est disponible par email pour toute question relative aux produits achetés.</p>

<h2>9. Contact</h2>
<p>Pour toute question : contact@digital-kappa.com</p>
</div>',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    );

    $page_id = wp_insert_post(array(
        'post_title' => 'Conditions Générales de Vente',
        'post_name' => 'conditions-generales-de-vente',
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

    // Set as WooCommerce terms page
    update_option('woocommerce_terms_page_id', $page_id);

    return is_wp_error($page_id)
        ? array('status' => 'error', 'message' => $page_id->get_error_message())
        : array('status' => 'created', 'message' => 'Page CGV créée', 'id' => $page_id);
}
