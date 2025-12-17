<?php
/**
 * Create Privacy Policy Page
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create privacy policy page
 */
function dk_create_privacy_page() {
    $existing = get_page_by_path('politique-de-confidentialite');
    if ($existing) {
        return array('status' => 'skipped', 'message' => 'Page Confidentialité existe déjà', 'id' => $existing->ID);
    }

    $elementor_data = array(
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_page_header', array(
                    'title' => 'Politique de Confidentialité',
                    'description' => 'Dernière mise à jour : Janvier 2025',
                )),
            ))
        ),
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('text-editor', array(
                    'editor' => '<div class="legal-content">
<h2>1. Collecte des données</h2>
<p>Nous collectons les données personnelles que vous nous fournissez lors de votre inscription ou de vos achats : nom, prénom, adresse email, informations de facturation.</p>

<h2>2. Utilisation des données</h2>
<p>Vos données sont utilisées pour :</p>
<ul>
<li>Traiter vos commandes et vous envoyer les produits achetés</li>
<li>Vous envoyer des emails de confirmation et de suivi</li>
<li>Répondre à vos demandes de support</li>
<li>Améliorer nos services</li>
</ul>

<h2>3. Protection des données</h2>
<p>Vos données sont stockées de manière sécurisée. Nous utilisons le cryptage SSL pour toutes les transactions.</p>

<h2>4. Cookies</h2>
<p>Nous utilisons des cookies pour améliorer votre expérience de navigation et analyser le trafic du site.</p>

<h2>5. Partage des données</h2>
<p>Nous ne vendons ni ne louons vos données personnelles. Elles peuvent être partagées avec nos prestataires de paiement dans le cadre du traitement de vos commandes.</p>

<h2>6. Vos droits</h2>
<p>Conformément au RGPD, vous disposez d\'un droit d\'accès, de rectification et de suppression de vos données. Contactez-nous pour exercer ces droits.</p>

<h2>7. Conservation des données</h2>
<p>Vos données sont conservées pendant la durée nécessaire aux finalités décrites, et conformément aux obligations légales.</p>

<h2>8. Contact</h2>
<p>Pour toute question concernant vos données : privacy@digital-kappa.com</p>
</div>',
                )),
            ))
        ),
    );

    $page_id = wp_insert_post(array(
        'post_title' => 'Politique de Confidentialité',
        'post_name' => 'politique-de-confidentialite',
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

    // Set as WordPress privacy page
    update_option('wp_page_for_privacy_policy', $page_id);

    return is_wp_error($page_id)
        ? array('status' => 'error', 'message' => $page_id->get_error_message())
        : array('status' => 'created', 'message' => 'Page Confidentialité créée', 'id' => $page_id);
}
