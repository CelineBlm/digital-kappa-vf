<?php
/**
 * Import Products from CSV
 *
 * @package Digital_Kappa_Setup
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Import products from embedded data
 * Based on woocommerce-products-import.csv
 */
function dk_import_products_from_csv() {
    if (!class_exists('WooCommerce')) {
        return array(
            'status' => 'error',
            'message' => 'WooCommerce n\'est pas installé',
        );
    }

    $results = array(
        'created' => array(),
        'skipped' => array(),
        'errors' => array(),
    );

    // Products data (from CSV)
    $products = dk_get_products_data();

    foreach ($products as $product_data) {
        $result = dk_create_product($product_data);

        if ($result['status'] === 'created') {
            $results['created'][] = $product_data['name'];
        } elseif ($result['status'] === 'skipped') {
            $results['skipped'][] = $product_data['name'];
        } else {
            $results['errors'][] = $product_data['name'] . ': ' . $result['message'];
        }
    }

    $results['count'] = count($results['created']) + count($results['skipped']);

    return $results;
}

/**
 * Create a single product
 */
function dk_create_product($data) {
    // Check if product exists
    $existing = get_page_by_title($data['name'], OBJECT, 'product');
    if ($existing) {
        return array('status' => 'skipped', 'id' => $existing->ID);
    }

    // Create product
    $product = new WC_Product_Simple();

    $product->set_name($data['name']);
    $product->set_description($data['description']);
    $product->set_short_description($data['short_description']);
    $product->set_regular_price($data['price']);
    $product->set_status('publish');
    $product->set_catalog_visibility('visible');
    $product->set_virtual(true);
    $product->set_downloadable(true);

    // Set category
    if (!empty($data['category'])) {
        $category = get_term_by('name', $data['category'], 'product_cat');
        if (!$category) {
            $category = wp_insert_term($data['category'], 'product_cat');
            if (!is_wp_error($category)) {
                $category_id = $category['term_id'];
            }
        } else {
            $category_id = $category->term_id;
        }
        if (isset($category_id)) {
            $product->set_category_ids(array($category_id));
        }
    }

    // Save product
    $product_id = $product->save();

    if (!$product_id) {
        return array('status' => 'error', 'message' => 'Erreur lors de la création');
    }

    // Set ACF fields if available
    if (function_exists('update_field')) {
        if (!empty($data['rating'])) {
            update_field('product_rating', $data['rating'], $product_id);
        }
        if (!empty($data['features'])) {
            update_field('product_features', $data['features'], $product_id);
        }
        if (!empty($data['included'])) {
            update_field('product_included', $data['included'], $product_id);
        }
        if (!empty($data['requirements'])) {
            update_field('product_requirements', $data['requirements'], $product_id);
        }
    }

    // Set meta for rating
    update_post_meta($product_id, '_dk_rating', $data['rating'] ?? 5);
    update_post_meta($product_id, '_dk_features', $data['features'] ?? '');
    update_post_meta($product_id, '_dk_included', $data['included'] ?? '');
    update_post_meta($product_id, '_dk_requirements', $data['requirements'] ?? '');

    return array('status' => 'created', 'id' => $product_id);
}

/**
 * Get products data
 */
function dk_get_products_data() {
    return array(
        array(
            'name' => 'Dashboard Analytics Pro',
            'sku' => 'DAP-001',
            'price' => '49',
            'category' => 'Templates',
            'description' => 'Template de tableau de bord analytique complet avec graphiques interactifs, widgets personnalisables et thème sombre/clair. Parfait pour les applications SaaS et les outils de gestion.',
            'short_description' => 'Template de tableau de bord analytique complet avec graphiques interactifs.',
            'rating' => '4.9',
            'features' => 'Plus de 50 composants|Graphiques interactifs|Mode sombre/clair|Design responsive|Code propre et documenté',
            'included' => 'Fichiers Figma source|Composants React|Documentation complète|Mises à jour gratuites',
            'requirements' => 'Figma (dernière version)|React 18+|Node.js 16+',
        ),
        array(
            'name' => 'E-commerce UI Kit Premium',
            'sku' => 'EUK-002',
            'price' => '79',
            'category' => 'UI Kits',
            'description' => 'Kit UI complet pour créer des boutiques en ligne modernes. Inclut pages produits, panier, checkout et compte utilisateur.',
            'short_description' => 'Kit UI complet pour boutiques en ligne modernes.',
            'rating' => '4.8',
            'features' => 'Plus de 100 écrans|Composants e-commerce|Animations fluides|Multi-plateformes',
            'included' => 'Fichiers Figma|Composants Vue.js|Assets exportés|Support premium',
            'requirements' => 'Figma|Vue.js 3+|Tailwind CSS',
        ),
        array(
            'name' => 'Icon Pack Business',
            'sku' => 'IPB-003',
            'price' => '29',
            'category' => 'Icônes',
            'description' => 'Collection de 500+ icônes professionnelles pour applications business. Style cohérent, multiples formats.',
            'short_description' => '500+ icônes professionnelles pour applications business.',
            'rating' => '5.0',
            'features' => '500+ icônes|SVG optimisés|Multiples styles|Facile à personnaliser',
            'included' => 'Fichiers SVG|Fichiers PNG|Sprite sheets|Licence commerciale',
            'requirements' => 'Éditeur vectoriel (optionnel)',
        ),
        array(
            'name' => 'Landing Page Collection',
            'sku' => 'LPC-004',
            'price' => '59',
            'category' => 'Templates',
            'description' => '10 landing pages modernes et convertissantes pour SaaS, agences et startups. Design premium et optimisées.',
            'short_description' => '10 landing pages modernes pour SaaS et startups.',
            'rating' => '4.7',
            'features' => '10 designs uniques|Optimisées conversion|SEO-friendly|Animations CSS',
            'included' => 'Fichiers HTML/CSS|Versions React|Documentation|Support 6 mois',
            'requirements' => 'Éditeur de code|React (optionnel)',
        ),
        array(
            'name' => 'Mobile App UI Kit',
            'sku' => 'MAU-005',
            'price' => '89',
            'category' => 'UI Kits',
            'description' => 'Kit complet pour applications mobiles iOS et Android. Plus de 200 écrans organisés par catégories.',
            'short_description' => 'Kit UI complet pour apps iOS et Android.',
            'rating' => '4.9',
            'features' => '200+ écrans|iOS et Android|Composants natifs|Design System inclus',
            'included' => 'Fichiers Figma|Composants Flutter|Assets 2x et 3x|Vidéos tutoriels',
            'requirements' => 'Figma|Flutter SDK|Dart',
        ),
        array(
            'name' => 'Illustration Pack Startup',
            'sku' => 'IPS-006',
            'price' => '39',
            'category' => 'Illustrations',
            'description' => '50 illustrations vectorielles modernes pour sites web et applications de startups tech.',
            'short_description' => '50 illustrations modernes pour startups tech.',
            'rating' => '4.8',
            'features' => '50 illustrations|Style moderne|Couleurs personnalisables|Haute résolution',
            'included' => 'Fichiers AI/SVG|Versions PNG|Palette de couleurs|Licence étendue',
            'requirements' => 'Adobe Illustrator ou équivalent',
        ),
        array(
            'name' => 'Admin Dashboard Kit',
            'sku' => 'ADK-007',
            'price' => '69',
            'category' => 'Templates',
            'description' => 'Template admin complet avec tous les composants nécessaires pour créer des interfaces de gestion professionnelles.',
            'short_description' => 'Template admin complet pour interfaces de gestion.',
            'rating' => '4.6',
            'features' => '80+ pages|Tables de données|Formulaires avancés|Graphiques et stats',
            'included' => 'Code source complet|Composants modulaires|Documentation API|Support email',
            'requirements' => 'React 18+|TypeScript|Node.js 18+',
        ),
        array(
            'name' => 'Social Media Icons',
            'sku' => 'SMI-008',
            'price' => '19',
            'category' => 'Icônes',
            'description' => 'Collection complète d\'icônes de réseaux sociaux dans 4 styles différents. Parfait pour sites et apps.',
            'short_description' => 'Icônes réseaux sociaux en 4 styles différents.',
            'rating' => '4.9',
            'features' => '60+ plateformes|4 styles|Formats multiples|Mises à jour régulières',
            'included' => 'SVG et PNG|Icon font|Fichiers source|Documentation',
            'requirements' => 'Aucun prérequis technique',
        ),
        array(
            'name' => 'Blog Theme Pro',
            'sku' => 'BTP-009',
            'price' => '45',
            'category' => 'Templates',
            'description' => 'Thème de blog moderne et élégant optimisé pour la lecture et le SEO. Parfait pour créateurs de contenu.',
            'short_description' => 'Thème blog moderne optimisé SEO.',
            'rating' => '4.7',
            'features' => 'Design épuré|SEO optimisé|Mode lecture|Partage social',
            'included' => 'Fichiers WordPress|Thème enfant|Documentation|Plugins premium',
            'requirements' => 'WordPress 6.0+|PHP 8.0+',
        ),
        array(
            'name' => 'Fintech UI Components',
            'sku' => 'FUC-010',
            'price' => '99',
            'category' => 'UI Kits',
            'description' => 'Composants UI spécialisés pour applications financières et bancaires. Sécurité et UX optimisées.',
            'short_description' => 'Composants UI pour apps financières.',
            'rating' => '4.8',
            'features' => 'Composants bancaires|Graphiques financiers|Sécurité UX|Accessibilité AAA',
            'included' => 'Design System complet|Code React|Tests unitaires|Audit accessibilité',
            'requirements' => 'React 18+|TypeScript|Testing Library',
        ),
        array(
            'name' => '3D Icons Collection',
            'sku' => '3DI-011',
            'price' => '35',
            'category' => 'Icônes',
            'description' => 'Collection de 200 icônes 3D modernes avec ombres et gradients. Style glassmorphism tendance.',
            'short_description' => '200 icônes 3D style glassmorphism.',
            'rating' => '5.0',
            'features' => '200 icônes 3D|Haute résolution|Ombres réalistes|Style moderne',
            'included' => 'PNG haute qualité|Fichiers Blender source|Palette de couleurs|Licence commerciale',
            'requirements' => 'Blender 3.0+ (pour édition)',
        ),
        array(
            'name' => 'SaaS Pricing Components',
            'sku' => 'SPC-012',
            'price' => '25',
            'category' => 'Templates',
            'description' => '15 modèles de tables de pricing convertissantes pour SaaS. A/B testés et optimisés.',
            'short_description' => '15 modèles de pricing tables convertissantes.',
            'rating' => '4.6',
            'features' => '15 designs|A/B testés|Animations|Mobile-first',
            'included' => 'HTML/CSS|Versions React et Vue|Analytics intégré|Guide conversion',
            'requirements' => 'Éditeur de code',
        ),
        array(
            'name' => 'Character Illustrations',
            'sku' => 'CHI-013',
            'price' => '55',
            'category' => 'Illustrations',
            'description' => '30 personnages illustrés avec variations de poses et expressions. Parfait pour storytelling.',
            'short_description' => '30 personnages illustrés avec variations.',
            'rating' => '4.9',
            'features' => '30 personnages|Poses multiples|Expressions variées|Style cohérent',
            'included' => 'Fichiers AI/SVG|PNG transparents|Guide de style|Poses supplémentaires',
            'requirements' => 'Adobe Illustrator ou Figma',
        ),
    );
}
