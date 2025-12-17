# PROMPT POUR CLAUDE CODE - Conversion React vers WordPress/WooCommerce

## 🎯 OBJECTIF PRINCIPAL

Tu dois convertir ce projet React (Digital Kappa) en un site WordPress + WooCommerce 100% fonctionnel pour vendre des produits digitaux dématérialisés.

**RÈGLE ABSOLUE N°1** : TOUTES les pages doivent être créées en **PHP** et utiliser des **widgets Elementor custom** pré-configurés. Les pages doivent être visibles et modifiables immédiatement après import.

**RÈGLE ABSOLUE N°2** : Tu dois reproduire EXACTEMENT le design, les textes, les images et l'ordre des sections du projet React (branch main). Copier-coller les textes depuis les fichiers React. Utiliser les mêmes URLs d'images. Respecter l'ordre exact des sections.

**RÈGLE ABSOLUE N°3** : Les styles doivent correspondre pixel-perfect à la feuille `/styles/globals.css` du projet React.

---

## 📋 PAGES À CRÉER AUTOMATIQUEMENT

### ⚠️ CRÉATION AUTOMATIQUE OBLIGATOIRE EN PHP

Le plugin `digital-kappa-setup.php` doit créer **AUTOMATIQUEMENT** toutes ces pages en PHP lors de l'activation :

1. **Page Accueil** (`/App.tsx` → `HomePage.tsx`)
2. **Page Comment ça marche** (`/HowItWorks.tsx`)
3. **Page FAQ** (`/FAQ.tsx`)
4. **Page À propos** (`/About.tsx`)
5. **Page CGV** (`/TermsOfSale.tsx`)
6. **Page Politique de confidentialité** (`/PrivacyPolicy.tsx`)
7. **Page Listing produits** (`/AllProducts.tsx`)
8. **Page Checkout** (`/Checkout.tsx`)
9. **Page Confirmation de commande** (`/OrderConfirmation.tsx`)
10. **Template Produit** (`/ProductDetail.tsx`)

---

## 📝 MÉTHODOLOGIE DE CRÉATION DES PAGES

### Étape 1 : Créer les widgets Elementor custom pour chaque section

**Pour CHAQUE section du React, tu dois créer un widget Elementor custom.**

#### Exemple : Hero Section de la page d'accueil

**Fichier React source :** `/components/HomePage.tsx` (section Hero)

**Widget à créer :** `/elementor-widgets/class-hero-section.php`

```php
<?php
class DK_Hero_Section extends \Elementor\Widget_Base {
    
    public function get_name() {
        return 'dk_hero_section';
    }
    
    public function get_title() {
        return 'Hero Section (Digital Kappa)';
    }
    
    public function get_icon() {
        return 'eicon-banner';
    }
    
    public function get_categories() {
        return ['digital-kappa'];
    }
    
    protected function register_controls() {
        // Section Content
        $this->start_controls_section(
            'content_section',
            [
                'label' => 'Contenu',
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'title',
            [
                'label' => 'Titre',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Propulsez vos projets avec nos produits digitaux premium', // TEXTE EXACT DU REACT
            ]
        );
        
        $this->add_control(
            'description_1',
            [
                'label' => 'Description 1',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Découvrez notre sélection de produits digitaux de haute qualité...', // TEXTE EXACT DU REACT
            ]
        );
        
        $this->add_control(
            'description_2',
            [
                'label' => 'Description 2',
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Chaque produit est soigneusement vérifié...', // TEXTE EXACT DU REACT
            ]
        );
        
        $this->add_control(
            'cta_text',
            [
                'label' => 'Texte du bouton',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Découvrir nos produits',
            ]
        );
        
        $this->add_control(
            'cta_link',
            [
                'label' => 'Lien du bouton',
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '/produits',
                ],
            ]
        );
        
        $this->add_control(
            'hero_image',
            [
                'label' => 'Image Hero',
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085', // URL EXACTE DU REACT
                ],
            ]
        );
        
        $this->end_controls_section();
    }
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="relative bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-28 py-12 lg:py-20">
                <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-12 items-center">
                    <!-- Colonne gauche - Texte (60%) -->
                    <div class="lg:col-span-3 space-y-6">
                        <h1 class="font-['Merriweather'] text-[#1a1a1a]">
                            <?php echo esc_html($settings['title']); ?>
                        </h1>
                        <div class="space-y-4">
                            <p class="text-[#364153]">
                                <?php echo esc_html($settings['description_1']); ?>
                            </p>
                            <p class="text-[#364153]">
                                <?php echo esc_html($settings['description_2']); ?>
                            </p>
                        </div>
                        <div class="pt-4">
                            <a href="<?php echo esc_url($settings['cta_link']['url']); ?>" 
                               class="inline-block bg-[#d2a30b] hover:bg-[#b8900a] text-white px-8 py-3 rounded-lg transition-colors">
                                <?php echo esc_html($settings['cta_text']); ?>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Colonne droite - Image (40%) -->
                    <div class="lg:col-span-2">
                        <img src="<?php echo esc_url($settings['hero_image']['url']); ?>" 
                             alt="Hero" 
                             class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
```

**⚠️ IMPORTANT :** Tu dois créer un widget custom pour CHAQUE section de CHAQUE page React. Les valeurs par défaut doivent contenir les textes et images EXACTS du React.

---

### Étape 2 : Créer les pages PHP avec Elementor

**Pour CHAQUE page, tu dois créer un fichier PHP qui construit la page avec Elementor.**

#### Exemple : Page d'accueil

**Fichier à créer :** `/inc/pages/create-homepage.php`

```php
<?php
function dk_create_homepage() {
    // Créer la page WordPress
    $page_id = wp_insert_post(array(
        'post_title' => 'Accueil',
        'post_name' => 'accueil',
        'post_status' => 'publish',
        'post_type' => 'page'
    ));
    
    if (!$page_id) {
        return false;
    }
    
    // Activer Elementor pour cette page
    update_post_meta($page_id, '_elementor_edit_mode', 'builder');
    update_post_meta($page_id, '_elementor_template_type', 'wp-page');
    update_post_meta($page_id, '_wp_page_template', 'elementor_header_footer');
    
    // Construire la structure Elementor avec les widgets custom
    $elementor_data = array(
        // Section 1 : Hero
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_hero_section', // Widget custom créé
                            'settings' => array(
                                'title' => 'Propulsez vos projets avec nos produits digitaux premium',
                                'description_1' => 'Découvrez notre sélection de produits digitaux de haute qualité, conçus pour vous aider à réussir dans vos projets professionnels et personnels.',
                                'description_2' => 'Chaque produit est soigneusement vérifié par notre équipe pour garantir la meilleure expérience possible.',
                                'cta_text' => 'Découvrir nos produits',
                                'cta_link' => array('url' => '/produits'),
                                'hero_image' => array('url' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085')
                            )
                        )
                    )
                )
            )
        ),
        
        // Section 2 : Features (3 colonnes)
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#f9fafb'
            ),
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_features_section', // Widget custom
                            'settings' => array() // Données par défaut du widget
                        )
                    )
                )
            )
        ),
        
        // Section 3 : Stats (3 colonnes)
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_stats_section', // Widget custom
                            'settings' => array(
                                'stat_1_number' => '500+',
                                'stat_1_text' => 'Produits disponibles',
                                'stat_2_number' => '50k+',
                                'stat_2_text' => 'Clients satisfaits',
                                'stat_3_number' => '4.8/5',
                                'stat_3_text' => 'Note moyenne'
                            )
                        )
                    )
                )
            )
        ),
        
        // Section 4 : Produits vedettes
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_product_grid', // Widget custom
                            'settings' => array(
                                'title' => 'Nos produits les plus populaires',
                                'products_type' => 'featured',
                                'posts_per_page' => 6,
                                'columns' => 3
                            )
                        )
                    )
                )
            )
        ),
        
        // Section 5 : Process (4 étapes)
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_process_section', // Widget custom
                            'settings' => array() // Données exactes du React
                        )
                    )
                )
            )
        ),
        
        // Section 6 : Témoignages
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#f9fafb'
            ),
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_testimonials', // Widget custom
                            'settings' => array() // Données exactes du React
                        )
                    )
                )
            )
        ),
        
        // Section 7 : FAQ
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_faq_accordion', // Widget custom
                            'settings' => array(
                                'title' => 'Questions fréquentes',
                                // Reprendre les 5 questions/réponses EXACTES du React
                            )
                        )
                    )
                )
            )
        ),
        
        // Section 8 : CTA Final
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#2b2d31'
            ),
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_cta_section', // Widget custom
                            'settings' => array(
                                'title' => 'Prêt à transformer vos idées en réalité ?',
                                'subtitle' => 'Rejoignez des milliers de professionnels qui utilisent nos produits',
                                'cta_text' => 'Découvrir nos produits',
                                'cta_link' => array('url' => '/produits')
                            )
                        )
                    )
                )
            )
        )
    );
    
    // Enregistrer la structure Elementor
    update_post_meta($page_id, '_elementor_data', wp_slash(wp_json_encode($elementor_data)));
    
    // Définir comme page d'accueil
    update_option('page_on_front', $page_id);
    update_option('show_on_front', 'page');
    
    return $page_id;
}
```

---

### Étape 3 : Appeler la création des pages dans le plugin

**Fichier :** `digital-kappa-setup.php`

```php
<?php
/**
 * Plugin Name: Digital Kappa Setup
 * Description: Import automatique des pages, produits et configuration
 * Version: 1.0.0
 */

register_activation_hook(__FILE__, 'dk_auto_setup');

function dk_auto_setup() {
    // Charger les fichiers de création de pages
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-homepage.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-how-it-works.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-faq.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-about.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-cgv.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-privacy.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-all-products.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-checkout.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-order-confirmation.php';
    require_once plugin_dir_path(__FILE__) . 'inc/pages/create-product-template.php';
    
    // Créer toutes les pages
    dk_create_homepage();
    dk_create_how_it_works_page();
    dk_create_faq_page();
    dk_create_about_page();
    dk_create_cgv_page();
    dk_create_privacy_page();
    dk_create_all_products_page();
    dk_create_checkout_page();
    dk_create_order_confirmation_page();
    dk_create_product_template();
    
    // Créer le header et footer
    dk_create_header();
    dk_create_footer();
    
    // Import produits
    dk_import_products();
    
    // Créer les menus
    dk_create_menus();
    
    // Configurer WooCommerce
    dk_setup_woocommerce();
    
    // Message de succès
    set_transient('dk_setup_complete', true, 60);
}
```

---

## 🧩 WIDGETS ELEMENTOR CUSTOM À CRÉER

### Liste complète des widgets nécessaires

**Pour la page d'accueil :**
1. `dk_hero_section` - Hero avec titre, 2 descriptions, CTA, image
2. `dk_features_section` - 3 features (Download, Shield, Zap)
3. `dk_stats_section` - 3 statistiques
4. `dk_product_grid` - Grille de produits WooCommerce
5. `dk_process_section` - 4 étapes du processus
6. `dk_testimonials` - Carousel de 3 témoignages
7. `dk_faq_accordion` - Accordéon FAQ (5 questions minimum)
8. `dk_cta_section` - CTA final avec fond sombre

**Pour la page Comment ça marche :**
9. `dk_page_header` - Header de page (titre + description)
10. `dk_process_steps` - Timeline verticale 4 étapes

**Pour la page Listing produits :**
11. `dk_product_filters` - Sidebar filtres (catégories, prix, note)
12. `dk_product_listing` - Grid produits avec pagination

**Pour la page Produit :**
13. `dk_product_gallery` - Carousel images produit
14. `dk_product_info` - Infos produit (titre, prix, rating, CTA)
15. `dk_product_features` - Liste features (ACF)
16. `dk_product_tabs` - Tabs (Description, Inclus, Prérequis, Avis+FAQ)
17. `dk_product_related` - Carousel produits similaires

**Pour la page Checkout :**
18. `dk_checkout_form` - Formulaire checkout 2 colonnes
19. `dk_order_summary` - Récapitulatif commande (sticky)

**Pour la page Confirmation :**
20. `dk_order_confirmation` - Layout confirmation complète

**Header & Footer :**
21. `dk_header_logo` - Logo + sous-titre
22. `dk_header_search` - Search bar AJAX
23. `dk_footer_content` - Footer 3 colonnes

---

## 🎨 REPRODUCTION EXACTE DES STYLES

### Fichier de référence : `/styles/globals.css`

**Créer le fichier :** `/assets/css/digital-kappa-styles.css`

**⚠️ COPIER EXACTEMENT tout le contenu de `/styles/globals.css` du React.**

```css
/* === COPIE COMPLÈTE DE /styles/globals.css === */

:root {
  --color-gold: #d2a30b;
  --color-gold-dark: #b8900a;
  --color-dark: #1a1a1a;
  --color-dark-alt: #2b2d31;
  --color-gray: #364153;
  --color-gray-light: #9ca3af;
  --color-gray-bg: #f9fafb;
  
  --font-montserrat: 'Montserrat', sans-serif;
  --font-merriweather: 'Merriweather', serif;
}

/* Copier TOUS les styles : typographie, boutons, cards, animations, etc. */
```

**Enqueue dans `functions.php` :**

```php
function digital_kappa_enqueue_styles() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;600;700&display=swap');
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.0/dist/tailwind.min.css');
    wp_enqueue_style('digital-kappa-styles', get_template_directory_uri() . '/assets/css/digital-kappa-styles.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'digital_kappa_enqueue_styles');
```

---

## 🖼️ LOGO DIGITAL KAPPA

### Fichier logo : `logo-digital-kappa.svg`

**Emplacement :** `/assets/images/logo-digital-kappa.svg`

### Widget Logo Header

**Fichier :** `/elementor-widgets/class-header-logo.php`

```php
<?php
class DK_Header_Logo extends \Elementor\Widget_Base {
    
    public function get_name() {
        return 'dk_header_logo';
    }
    
    public function get_title() {
        return 'Logo Header (Digital Kappa)';
    }
    
    public function get_categories() {
        return ['digital-kappa'];
    }
    
    protected function render() {
        ?>
        <a href="<?php echo home_url(); ?>" class="flex items-center gap-3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-digital-kappa.svg" 
                 alt="Digital Kappa" 
                 class="h-8 w-auto">
            <div class="flex flex-col items-start">
                <span class="font-['Montserrat',sans-serif] text-[#1a1a1a]">Digital Kappa</span>
                <span class="text-[10px] font-['Montserrat',sans-serif] text-[#d2a30b] tracking-wide">
                    PRODUITS DIGITAUX PREMIUM
                </span>
            </div>
        </a>
        <?php
    }
}
```

### Logo Footer (blanc)

```css
.footer-logo {
    filter: brightness(0) invert(1);
}
```

---

## 🏗️ HEADER & FOOTER

### Header Digital Kappa

**Créer via :** Elementor Theme Builder → Header

**Fonction de création :** `/inc/create-header.php`

```php
<?php
function dk_create_header() {
    $header_id = wp_insert_post(array(
        'post_title' => 'Header Digital Kappa',
        'post_type' => 'elementor_library',
        'post_status' => 'publish'
    ));
    
    update_post_meta($header_id, '_elementor_template_type', 'header');
    update_post_meta($header_id, '_elementor_edit_mode', 'builder');
    
    // Structure Elementor du header
    $header_data = array(
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#ffffff',
                'border_border' => 'solid',
                'border_width' => array('bottom' => '1'),
                'border_color' => '#e5e7eb',
                'padding' => array('top' => '16', 'bottom' => '16', 'left' => '112', 'right' => '112'),
                'position' => 'sticky',
                'z_index' => 40
            ),
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 25),
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_header_logo'
                        )
                    )
                ),
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 40),
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_header_search'
                        )
                    )
                ),
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'settings' => array('_column_size' => 35),
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'nav-menu',
                            'settings' => array(
                                'menu' => 'header-menu'
                            )
                        )
                    )
                )
            )
        )
    );
    
    update_post_meta($header_id, '_elementor_data', wp_slash(wp_json_encode($header_data)));
    
    // Assigner à tout le site
    update_option('elementor_header_location', $header_id);
    
    return $header_id;
}
```

---

### Footer Digital Kappa

**Fonction de création :** `/inc/create-footer.php`

```php
<?php
function dk_create_footer() {
    $footer_id = wp_insert_post(array(
        'post_title' => 'Footer Digital Kappa',
        'post_type' => 'elementor_library',
        'post_status' => 'publish'
    ));
    
    update_post_meta($footer_id, '_elementor_template_type', 'footer');
    update_post_meta($footer_id, '_elementor_edit_mode', 'builder');
    
    // Structure Elementor du footer (3 colonnes + copyright)
    $footer_data = array(
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#1a1a1a',
                'padding' => array('top' => '48', 'bottom' => '48', 'left' => '112', 'right' => '112')
            ),
            'elements' => array(
                // Colonne 1 : Logo blanc + texte
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'dk_footer_logo'
                        )
                    )
                ),
                // Colonne 2 : Menu Catégories
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'nav-menu',
                            'settings' => array(
                                'menu' => 'footer-categories',
                                'layout' => 'vertical'
                            )
                        )
                    )
                ),
                // Colonne 3 : Menu Légal
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'nav-menu',
                            'settings' => array(
                                'menu' => 'footer-legal',
                                'layout' => 'vertical'
                            )
                        )
                    )
                )
            )
        ),
        // Section copyright
        array(
            'id' => \Elementor\Utils::generate_random_string(),
            'elType' => 'section',
            'settings' => array(
                'background_background' => 'classic',
                'background_color' => '#1a1a1a',
                'border_border' => 'solid',
                'border_width' => array('top' => '1'),
                'border_color' => '#374151',
                'padding' => array('top' => '24', 'bottom' => '24')
            ),
            'elements' => array(
                array(
                    'id' => \Elementor\Utils::generate_random_string(),
                    'elType' => 'column',
                    'elements' => array(
                        array(
                            'id' => \Elementor\Utils::generate_random_string(),
                            'elType' => 'widget',
                            'widgetType' => 'text-editor',
                            'settings' => array(
                                'editor' => '© 2024 Digital Kappa. Tous droits réservés.',
                                'align' => 'center',
                                'text_color' => '#9ca3af'
                            )
                        )
                    )
                )
            )
        )
    );
    
    update_post_meta($footer_id, '_elementor_data', wp_slash(wp_json_encode($footer_data)));
    
    // Assigner à tout le site
    update_option('elementor_footer_location', $footer_id);
    
    return $footer_id;
}
```

---

## 📦 IMPORT AUTOMATIQUE DES PRODUITS

**Fichier CSV :** `/data/products-import.csv`

**Fonction d'import :** (Identique à la version précédente)

```php
function dk_import_products() {
    $csv_file = get_template_directory() . '/data/products-import.csv';
    
    if (!file_exists($csv_file)) {
        return false;
    }
    
    $products = array_map('str_getcsv', file($csv_file));
    $header = array_shift($products);
    
    foreach ($products as $row) {
        $product_data = array_combine($header, $row);
        
        // Créer le produit WooCommerce
        $product = new WC_Product_Simple();
        $product->set_name($product_data['Name']);
        $product->set_sku($product_data['SKU']);
        $product->set_regular_price($product_data['Regular price']);
        $product->set_sale_price($product_data['Sale price']);
        $product->set_short_description($product_data['Short description']);
        $product->set_description($product_data['Description']);
        $product->set_downloadable(true);
        $product->set_virtual(true);
        
        if ($product_data['Is featured?'] == '1') {
            $product->set_featured(true);
        }
        
        // Catégorie
        $category = term_exists($product_data['Categories'], 'product_cat');
        if ($category) {
            $product->set_category_ids([$category['term_id']]);
        }
        
        // Images
        $images = explode('|', $product_data['Images']);
        $image_ids = [];
        foreach ($images as $image_url) {
            $image_id = dk_upload_image_from_url(trim($image_url), $product_data['Name']);
            if ($image_id) {
                $image_ids[] = $image_id;
            }
        }
        if (!empty($image_ids)) {
            $product->set_image_id($image_ids[0]);
            $product->set_gallery_image_ids(array_slice($image_ids, 1));
        }
        
        $product_id = $product->save();
        
        // Métadonnées ACF
        if ($product_id) {
            // Features
            $features = explode('|', $product_data['Meta: features']);
            $features_array = array();
            foreach ($features as $f) {
                $features_array[] = array('feature_text' => trim($f));
            }
            update_field('features', $features_array, $product_id);
            
            // Included
            $included = explode('|', $product_data['Meta: included']);
            $included_array = array();
            foreach ($included as $i) {
                $included_array[] = array('included_item' => trim($i));
            }
            update_field('included', $included_array, $product_id);
            
            // Requirements
            $requirements = explode('|', $product_data['Meta: requirements']);
            $requirements_array = array();
            foreach ($requirements as $r) {
                $requirements_array[] = array('requirement_text' => trim($r));
            }
            update_field('requirements', $requirements_array, $product_id);
            
            // FAQ
            if (!empty($product_data['Meta: faq'])) {
                $faq_items = explode('||', $product_data['Meta: faq']);
                $faq_array = array();
                foreach ($faq_items as $item) {
                    $parts = explode('::', $item);
                    if (count($parts) == 2) {
                        $faq_array[] = array(
                            'question' => trim($parts[0]),
                            'answer' => trim($parts[1])
                        );
                    }
                }
                update_field('faq', $faq_array, $product_id);
            }
            
            // Rating et review count
            update_post_meta($product_id, 'rating', $product_data['Meta: rating']);
            update_post_meta($product_id, 'review_count', $product_data['Meta: review_count']);
        }
    }
    
    return true;
}
```

---

## 🔍 SEARCH BAR DYNAMIQUE (AJAX)

**Widget :** `/elementor-widgets/class-header-search.php`

```php
<?php
class DK_Header_Search extends \Elementor\Widget_Base {
    
    public function get_name() {
        return 'dk_header_search';
    }
    
    public function get_title() {
        return 'Search Bar (Digital Kappa)';
    }
    
    public function get_categories() {
        return ['digital-kappa'];
    }
    
    protected function render() {
        ?>
        <div class="relative search-container">
            <input type="text" 
                   id="product-search" 
                   placeholder="Rechercher un produit..."
                   class="w-full bg-gray-50 border border-gray-200 rounded-lg px-11 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#d2a30b]">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" 
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <div id="search-results" 
                 class="absolute top-full left-0 right-0 bg-white border shadow-lg rounded-lg mt-2 hidden z-50 max-h-96 overflow-y-auto">
            </div>
        </div>
        <?php
    }
}
```

**Fichier JS :** `/assets/js/search-autocomplete.js`

```javascript
jQuery(document).ready(function($) {
    let searchTimeout;
    const $searchInput = $('#product-search');
    const $results = $('#search-results');
    
    $searchInput.on('keyup', function() {
        clearTimeout(searchTimeout);
        const term = $(this).val().trim();
        
        if (term.length < 2) {
            $results.addClass('hidden').empty();
            return;
        }
        
        searchTimeout = setTimeout(function() {
            $.ajax({
                url: dk_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'dk_search_products',
                    security: dk_ajax.nonce,
                    search: term
                },
                beforeSend: function() {
                    $results.html('<p class="p-4 text-sm text-gray-500">Recherche...</p>').removeClass('hidden');
                },
                success: function(response) {
                    if (response.success) {
                        $results.html(response.data).removeClass('hidden');
                    } else {
                        $results.html('<p class="p-4 text-sm text-gray-500">Aucun résultat</p>');
                    }
                }
            });
        }, 300);
    });
    
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.search-container').length) {
            $results.addClass('hidden');
        }
    });
});
```

---

## 📋 MENUS WORDPRESS

**Fonction :** `/inc/create-menus.php`

```php
<?php
function dk_create_menus() {
    // Créer les menus
    $header_menu_id = wp_create_nav_menu('Menu Header');
    $footer_cat_id = wp_create_nav_menu('Menu Footer Catégories');
    $footer_legal_id = wp_create_nav_menu('Menu Footer Légal');
    
    // Assigner les emplacements
    $locations = array(
        'header-menu' => $header_menu_id,
        'footer-categories' => $footer_cat_id,
        'footer-legal' => $footer_legal_id
    );
    set_theme_mod('nav_menu_locations', $locations);
    
    // Ajouter les items au menu header
    $home_id = get_option('page_on_front');
    $shop_id = get_option('woocommerce_shop_page_id');
    
    wp_update_nav_menu_item($header_menu_id, 0, array(
        'menu-item-title' => 'Accueil',
        'menu-item-object-id' => $home_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish',
        'menu-item-position' => 1
    ));
    
    wp_update_nav_menu_item($header_menu_id, 0, array(
        'menu-item-title' => 'Tous nos produits',
        'menu-item-object-id' => $shop_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish',
        'menu-item-position' => 2
    ));
    
    // Ajouter les catégories
    $categories = get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false));
    $position = 3;
    foreach ($categories as $category) {
        if (in_array($category->slug, ['ebooks', 'applications', 'templates'])) {
            wp_update_nav_menu_item($header_menu_id, 0, array(
                'menu-item-title' => $category->name,
                'menu-item-object-id' => $category->term_id,
                'menu-item-object' => 'product_cat',
                'menu-item-type' => 'taxonomy',
                'menu-item-status' => 'publish',
                'menu-item-position' => $position++
            ));
        }
    }
    
    // Ajouter FAQ et Comment ça marche
    $faq_id = get_page_by_path('faq')->ID;
    $how_id = get_page_by_path('comment-ca-marche')->ID;
    
    wp_update_nav_menu_item($header_menu_id, 0, array(
        'menu-item-title' => 'FAQ',
        'menu-item-object-id' => $faq_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish',
        'menu-item-position' => $position++
    ));
    
    wp_update_nav_menu_item($header_menu_id, 0, array(
        'menu-item-title' => 'Comment ça marche',
        'menu-item-object-id' => $how_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type',
        'menu-item-status' => 'publish',
        'menu-item-position' => $position++
    ));
}
```

---

## ✅ CHECKLIST FINALE

### Pages créées en PHP
- [ ] 10 pages créées en PHP avec Elementor
- [ ] Textes EXACTS copiés du React
- [ ] Images EXACTES (URLs Unsplash identiques)
- [ ] Ordre des sections EXACT
- [ ] Pages visibles immédiatement après import
- [ ] Pages éditables avec Elementor

### Widgets Elementor custom
- [ ] 23 widgets custom créés
- [ ] Valeurs par défaut = données exactes du React
- [ ] Widgets dans catégorie "Digital Kappa"
- [ ] Widgets configurables

### Logo
- [ ] `logo-digital-kappa.svg` dans `/assets/images/`
- [ ] Logo coloré dans header
- [ ] Logo blanc dans footer (CSS filter)

### Import produits
- [ ] 13 produits importés
- [ ] Images uploadées
- [ ] Métadonnées ACF remplies

### Header & Footer
- [ ] Header créé avec Elementor Theme Builder
- [ ] Footer créé avec Elementor Theme Builder
- [ ] Modifiables visuellement

### Menus
- [ ] 3 menus créés automatiquement
- [ ] Items ajoutés automatiquement
- [ ] Menus éditables

### Styles
- [ ] `digital-kappa-styles.css` = copie de `globals.css`
- [ ] Tailwind CSS chargé
- [ ] Google Fonts chargées
- [ ] Couleurs exactes

---

## 🚀 LIVRAISON

**Fichiers à fournir :**

1. `digital-kappa-theme.zip` (thème complet)
2. `digital-kappa-setup.zip` (plugin d'activation)
3. `README-INSTALLATION.md` (instructions)

**Site 100% opérationnel après installation du plugin.**

---

**Bon développement ! 🎨**
