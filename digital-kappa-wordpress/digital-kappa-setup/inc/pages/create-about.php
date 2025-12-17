<?php
/**
 * Create About Page
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create about page
 */
function dk_create_about_page() {
    $existing = get_page_by_path('a-propos');
    if ($existing) {
        return array('status' => 'skipped', 'message' => 'Page À propos existe déjà', 'id' => $existing->ID);
    }

    $elementor_data = array(
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('dk_page_header', array(
                    'title' => 'À propos de Digital Kappa',
                    'description' => 'Découvrez notre histoire, notre mission et les valeurs qui nous animent.',
                )),
            ))
        ),
        dk_create_section(
            dk_create_column(100, array(
                dk_create_widget('text-editor', array(
                    'editor' => '<h2>Notre Mission</h2>
<p>Digital Kappa est né de la passion pour le design et l\'innovation. Notre mission est de fournir aux créateurs, designers et développeurs les meilleures ressources numériques pour leurs projets.</p>

<h2>Nos Valeurs</h2>
<ul>
<li><strong>Qualité Premium</strong> - Chaque ressource est soigneusement créée et vérifiée</li>
<li><strong>Support Réactif</strong> - Une équipe disponible pour vous accompagner</li>
<li><strong>Innovation Continue</strong> - De nouvelles ressources ajoutées régulièrement</li>
<li><strong>Accessibilité</strong> - Des prix justes pour tous les budgets</li>
</ul>

<h2>L\'Équipe</h2>
<p>Notre équipe est composée de designers passionnés, de développeurs expérimentés et de professionnels du support client, tous unis par la volonté de vous offrir la meilleure expérience possible.</p>',
                )),
            ))
        ),
    );

    $page_id = wp_insert_post(array(
        'post_title' => 'À propos',
        'post_name' => 'a-propos',
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

    return is_wp_error($page_id)
        ? array('status' => 'error', 'message' => $page_id->get_error_message())
        : array('status' => 'created', 'message' => 'Page À propos créée', 'id' => $page_id);
}
